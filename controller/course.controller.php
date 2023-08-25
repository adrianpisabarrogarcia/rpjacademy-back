<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/course.model.php';

$controllerPrincipalUrl = "/course";


$app->get($controllerPrincipalUrl . '/all', function (Request $request, Response $response, $args) {
    $courses = Course::all();
    if ($courses == null) {
        $response->getBody()->write(json_encode(array("error" => "Courses not found")));
    } else {
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode(Course::all()));
    }
    return $response;
});


$app->get($controllerPrincipalUrl . '/{id}', callable: function (Request $request, Response $response, $args) {
    $course = Course::find($args['id']);
    if ($course == null) {
        $response->getBody()->write(json_encode(array("error" => "Course not found")));
    } else {
        $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($course));
    }
    return $response;
});
