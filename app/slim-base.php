<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require "../vendor/autoload.php";


$app = new \Slim\App();

$app->get('/', function ($request, $response, $args) {
	$response->getBody()->write("Hello world!");
});

$app->get('/test', function ($request, $response, $args) {
	$response->getBody()->write("test 1");
});

/*$app->get('/hi/{name}', function(Request $request, Response $response){});
*	Through GET Method obtains in URL value of {name}
*/
$app->get('/hi/{name}', function(Request $request, Response $response){

/*
* $request is instance of Request object used, get value of {name} using $request->getAttribute("object")
*/
	$name = $request->getAttribute("name");

/*
* $response is instance of Response object used. We get body and write it 
*/
	$response->getBody()->write("Hello Mr.$name");

	return $response;
});

//Slin can use withJson() to return JSON responses with roure and method

$app->get("/api/person", function($request, $response, $args){
	$payload=[];
	array_push($payload, array("name"=>"David", "age"=>20));
	array_push($payload, array("name"=>"Deiby", "age"=>20));
	return $response->withJson($payload, 200);
});


/*
$app->get("/namepath", function($request, $response, $args){});
$app->post("/namepath", function($request, $response, $args){});
*/


/*
*POST Request With Slim 3 (REST API)
*/
$app->post("/post/api", function(Request $request, Response $response, $args){
	$_input = $request->getParsedBody();
	$_data_1 = $_input["name"];
	$_data_2 = $_input["email"];

	if (!empty($_data_1 && $_data_2)) {
		# code...
		$rsp["error"] = false;
		$rsp["message"] = "Hello Mr.".$_data_1." and your email is ".$_data_2;
	} else{
		$rsp["error"] = false;
		$rsp['message'] = "you have not posted any data" ;
	}

	return $response
		->withJson(201)
		->withJson($rsp);
});


/**/
$app->get('/foo', function (Request $request, Response $response, array $args) {
    $payload = json_encode(['hello' => 'world'], JSON_PRETTY_PRINT);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});
/**/



$app->run();




