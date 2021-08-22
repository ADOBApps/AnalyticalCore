<?php


/*$data_json = file_get_contents("../../data/cities-list.json");
$cities = json_decode($data_json, true);


$q = $_REQUEST["q"];
$suggestion="";
if($q !== ""){
	$q = strtolower($q);
	$len = strlen($q);
	foreach($cities as $name){
		if( stristr($q, substr($name, 0, $len)) ){
			if($suggestion === ""){
				$suggestion = $name;
				echo($suggestion);
			} else {
				$suggestion .=  ", $name";
			}
		}
	}
}*/

$data_json = file_get_contents("../js/data/elements.json");
$elements = json_decode($data_json, true);

$e = $_REQUEST["e"];
$e_hint = "";
if ($e !== "") {
	$len = strlen($e);

	foreach ($elements as $name) {
		/*
			**stristr(string, search)
			**The stristr() function searches for the first occurrence of a string inside another string
			**stristr($e, substr(string, start, length))
			**The substr() function returns a part of a string
			**stristr($e, substr($name, 0, $len))
			*/
		if ( stristr($e, substr($name, 0, $len)) ) {
			if ($e_hint === "") {
				$e_hint = $name;
				echo ($e_hint);
			} else {
				$e_hint .= ", $name";
			}
			
		}
	}
}

/*
* Now idea is use Slim to have all proces in one PHP, mix between AJAX and Slim
*/

?>