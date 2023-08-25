<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/course.model.php';

$controllerPrincipalUrl = "/workshop";

$app->get($controllerPrincipalUrl . '/all', function (Request $request, Response $response, $args) {
    $workshops = Course::all();
    if ($workshops == null) {
        $response->getBody()->write(json_encode(array("error" => "Workshops not found")));
    } else {
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($workshops));
    }
    return $response;
});

$app->get($controllerPrincipalUrl . '/{id}', function (Request $request, Response $response, $args) {
    $workshop = Course::find($args['id']);
    if($workshop == null){
        $response->getBody()->write(json_encode(array("error" => "Workshop not found")));
    }else{
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($workshop));
    }
    return $response;
});