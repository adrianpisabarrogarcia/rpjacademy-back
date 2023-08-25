<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/course.model.php';

$controllerPrincipalUrl = "/workshop";

$app->get($controllerPrincipalUrl . '/all', function (Request $request, Response $response, $args) {
    $query = Course::where("workshop", true)->get();
    //if query has en error
    if ($query == null || count($query) == 0) {
        $response->getBody()->write(json_encode(array("error" => "Workshops not found")));
    } else {
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($query));
    }
    return $response;
});

$app->get($controllerPrincipalUrl . '/{id}', function (Request $request, Response $response, $args) {
    $query = Course::find($args['id']);
    error_log($query);
    if($query == null){
        $response->getBody()->write(json_encode(array("error" => "Workshop not found")));
    }else{
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($query));
    }
    return $response;
});