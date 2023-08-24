<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/course.model.php';

$controllerPrincipalUrl = "/course";


$app->get($controllerPrincipalUrl . '/all', function (Request $request, Response $response, $args) {
    $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(Course::all());
    return $response;
});


$app->get($controllerPrincipalUrl . '/{id}', callable: function (Request $request, Response $response, $args) {
    $workshop = Course::find($args['id']);
    if($workshop == null){
        $response->withStatus(404);
        $response->getBody()->write(json_encode(array("message" => "Course not found")));
    }else{
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write($workshop);
    }
    return $response;
});
