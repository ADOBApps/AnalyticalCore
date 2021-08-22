<?php
/*
* Now idea is use Slim to have all proces in one PHP, mix between AJAX and Slim
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require "../../../../../vendor/autoload.php";

require("lib/adob/file/adobfile.php");

$app = new \Slim\App();

$app->get("/test", function($request, $response, $args){
	$response->getBody()->write("Hi!");
});

$app->get("/data/{datum}", function(Request $request, Response $response, $args){
	$datum = $request->getAttribute("datum");
	$response->getBody()->write("This your datum: $datum");
});

$app->get("/ajax/get_e/{data}", function(Request $request, Response $response, array $args){
	//$data_json = file_get_contents("../js/data/elements.json");
	$data_json = file_get_contents("../data/ions.min.json");
	$elements = json_decode($data_json, true);

	$e = $args["data"]; //slim

	$e_hint = "";
	if ($e !== ""){
		# !== not identical.
		$len = strlen($e);
		foreach ($elements as $name) {
			/*
			**preg_match(string $key, string $string, array &$matches)
			** i: delimiter indicates a case-insensitive search
			** \b: delimiter indicates a case-sensitive search
			*/
			if ( preg_match("/\b$e\b/", $name, $my_match) ) {
				if ($e_hint === "") {
					# === means identical.
					$e_hint = $my_match[0];
					if ($request->getHeader('X-Requested-With') === 'XMLHttpRequest') {
						return $response->getBody()->write($e_hint);
					} else {
						return $response->withRedirect($request->getHeader('Referer'))
						->getBody()->write($e_hint);
					}
				} else {
					$e_hint .= ", $name";
					#.= is string concatenation function $e = $e . ", $name".
					#$b = &$a; $b is reference to $a.
				}
			}
		}
	}
	#return $response;
});

/*$app->get("/ajax/get_kps_module/", function(Request $request, Response $response, $args){
	
});
$app->post("/ajax/set_kps_module/", function(Request $request, Response $response, $args){
});*/

$app->post("/ajax/kps_calc/", function(Request $request, Response $response, $args){
	$adob = new ADOB_FM();
	$_input = $request->getParsedBody();
	
	$data_json = file_get_contents("../data/ions.json");
	$data_ion = json_decode($data_json, true);
	$kps_solv = 0;

	//Ion 1 values
	//$_ion_1[""] = $_input[""];
	$_ion_1["symbol"] = $_input["s_kps_input_element1"];
	$_ion_1["subindex"] = $_input["s_kps_subind_element1"];
	$_ion_1["concentration"] = $_input["s_kps_concentration_e1"];
	$_ion_1["concentration_ci"] = $_input["s_kps_concentration_ci_e1"];

	//Ion 2 values
	//$_ion_2[""] = $_input[""];
	$_ion_2["symbol"] = $_input["s_kps_input_element2"];
	$_ion_2["subindex"] = $_input["s_kps_subind_element2"];
	$_ion_2["concentration"] = $_input["s_kps_concentration_e2"];
	$_ion_2["concentration_ci"] = $_input["s_kps_concentration_ci_e2"];
	
	//Ionic force value
	$mu = $_input["s_kps_mu_value"];

	/*
	* Calculate kps agree to subindex
	*/
	//Ionic foce (/mu)
	if ( $mu == 0 ) {
		//Subindex1 == subindex2 == 1
		if ( $_ion_1["subindex"] == 1 && $_ion_2["subindex"] == 1 ) {
			$kps_solv = ($_ion_1["concentration"] * $_ion_2["concentration"]);
		//Subindex1 != 1;subindex2 == 1
		} else if ( $_ion_1["subindex"] != 1 && $_ion_2["subindex"] == 1 ) {
			$kps_solv = ($_ion_1["concentration"]**$_ion_1["subindex"]) * ($_ion_2["concentration"]);
		//Subindex1 == 1;subindex2 != 1
		} else if ( $_ion_1["subindex"] == 1 && $_ion_2["subindex"] != 1 ) {
			$kps_solv = ($_ion_1["concentration"]) * ($_ion_2["concentration"]**$_ion_2["subindex"]);
		//Subindex1 != 1;subindex2 != 1
		} else{
			$kps_solv = ($_ion_1["concentration"]**$_ion_1["subindex"]) * ($_ion_2["concentration"]**$_ion_2["subindex"]);
		}
	} else {
		//calculate of gamma values
		$charge_ion_1 = $data_ion[$_ion_1["symbol"]]["charge"];
		$charge_ion_2 = $data_ion[$_ion_2["symbol"]]["charge"];
		$alpha_ion_1 = $data_ion[$_ion_1["symbol"]]["alpha"];
		$alpha_ion_2 = $data_ion[$_ion_1["symbol"]]["alpha"];
		$gamma_ion_1 = 10**((-0.51*($charge_ion_1**(2))*($mu**(1/2)))/(1+(($alpha_ion_1*($mu**(1/2)))/305)));
		$gamma_ion_2 = 10**((-0.51*($charge_ion_2**(2))*($mu**(1/2)))/(1+(($alpha_ion_2*($mu**(1/2)))/305)));
		$gamma_comp = ($gamma_ion_1**$_ion_1["subindex"])*($gamma_ion_2**$_ion_2["subindex"]);
		
		//Subindex1 == subindex2 == 1
		if ( $_ion_1["subindex"] == 1 && $_ion_2["subindex"] == 1 ) {
			$kps_solv = ($gamma_comp * $_ion_1["concentration"] * $_ion_2["concentration"]);
		//Subindex1 != 1;subindex2 == 1
		} else if ( $_ion_1["subindex"] != 1 && $_ion_2["subindex"] == 1 ) {
			$kps_solv = ($gamma_comp * $_ion_1["concentration"]**$_ion_1["subindex"]) * ($_ion_2["concentration"]);
		//Subindex1 == 1;subindex2 != 1
		} else if ( $_ion_1["subindex"] == 1 && $_ion_2["subindex"] != 1 ) {
			$kps_solv = ($gamma_comp * $_ion_1["concentration"]) * ($_ion_2["concentration"]**$_ion_2["subindex"]);
		//Subindex1 != 1;subindex2 != 1
		} else{
			$kps_solv = ($gamma_comp * $_ion_1["concentration"]**$_ion_1["subindex"]) * ($_ion_2["concentration"]**$_ion_2["subindex"]);
		}
	}
	//Add info to json object to export
	$_comp["ion_1"] = $_ion_1;
	$_comp["ion_2"] = $_ion_2;
	$_comp["mu"] = $_input["s_kps_mu_value"];
	$_comp["calculed_kps"] = $kps_solv;

	if ( $adob->mkJson("../data", "calculed-kps.json", $_comp, LOCK_EX) ) {
		$s_solv = "OK";
		
		if ($request->getHeader('X-Requested-With') === 'XMLHttpRequest') {

			return $response->getBody()->write($kps_solv);
		} else {
			
			return $response->withRedirect($request->getHeader('Referer'))
			->getBody()->write($kps_solv);//$_comp["ion_2"]["symbol"]//$data_ion[$_comp["ion_2"]["symbol"]]["latex"]
		}
	} else {
		return $s_solv;
	}
});

$app->post("/ajax/solu_calc/", function(Request $request, Response $response, $args){
	$adob = new ADOB_FM();
	$_input = $request->getParsedBody();
	
	$data_json = file_get_contents("../data/ions.json");
	$data_ion = json_decode($data_json, true);
	$kps_solv = 0;
	//Ion 1 values
	//$_ion_1[""] = $_input[""];
	$_ion_1["symbol"] = $_input["s_kps_input_element1"];
	$_ion_1["subindex"] = $_input["s_kps_subind_element1"];
	$_ion_1["concentration"] = $_input["s_kps_concentration_e1"];
	$_ion_1["concentration_ci"] = $_input["s_kps_concentration_ci_e1"];

	//Ion 2 values
	//$_ion_2[""] = $_input[""];
	$_ion_2["symbol"] = $_input["s_kps_input_element2"];
	$_ion_2["subindex"] = $_input["s_kps_subind_element2"];
	$_ion_2["concentration"] = $_input["s_kps_concentration_e2"];
	$_ion_2["concentration_ci"] = $_input["s_kps_concentration_ci_e2"];
	//Ionic force value
	$_ion_2["mu"] = $_input["s_kps_mu_value"];

	/*
	* Calculate kps agree to subindex
	*/
	//Subindex1 == subindex2 == 1
	if ( $_ion_1["subindex"] == 1 && $_ion_2["subindex"] == 1 ) {
		$kps_solv = ($_ion_1["concentration"] * $_ion_2["concentration"]);
	//Subindex1 != 1;subindex2 == 1
	} else if ( $_ion_1["subindex"] != 1 && $_ion_2["subindex"] == 1 ) {
		$kps_solv = ($_ion_1["concentration"]**$_ion_1["subindex"]) * ($_ion_2["concentration"]);
	//Subindex1 == 1;subindex2 != 1
	} else if ( $_ion_1["subindex"] == 1 && $_ion_2["subindex"] != 1 ) {
		$kps_solv = ($_ion_1["concentration"]) * ($_ion_2["concentration"]**$_ion_2["subindex"]);
	//Subindex1 != 1;subindex2 != 1
	} else{
		$kps_solv = ($_ion_1["concentration"]**$_ion_1["subindex"]) * ($_ion_2["concentration"]**$_ion_2["subindex"]);
	}
	
	//Add info to json object to export
	$_comp["ion_1"] = $_ion_1;
	$_comp["ion_2"] = $_ion_2;
	$_comp["calculed_kps"] = $kps_solv;
	
});

$app->run();


?>