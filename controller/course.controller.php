<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/course.model.php';

$controllerPrincipalUrl = "/course";


$app->get($controllerPrincipalUrl . '/all', function (Request $request, Response $response, $args) {
    $query = Course::where("course", true)->get();
    if ($query == null || count($query) == 0) {
        $response->getBody()->write(json_encode(array("error" => "Courses not found")));
    } else {
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($query));
    }
    return $response;
});


$app->get($controllerPrincipalUrl . '/{id}', callable: function (Request $request, Response $response, $args) {
    $query = Course::find($args['id']);
    if ($query == null) {
        $response->getBody()->write(json_encode(array("error" => "Course not found")));
    } else {
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($query));
    }
    return $response;
});
