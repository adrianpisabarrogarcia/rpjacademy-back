<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/Course.model.php';
require_once __DIR__ . '/../models/Block.model.php';
require_once __DIR__ . '/../models/Institution.model.php';

$controllerPath = "/courses";

$app->get($controllerPath, function (Request $request, Response $response, $args) {
    $query = Course::where("course", true)->get();
    if ($query == null || count($query) == 0) {
        $response->getBody()->write("Workshops not found");
        return $response->withStatus(404);
    }
    $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode($query));
    return $response;
});

$app->get($controllerPath . '/{id}', callable: function (Request $request, Response $response, $args) {
    $query = Course::with('blocks', 'institutions')->find($args['id']);
    if ($query == null) {
        $response->getBody()->write("Workshops not found");
        return $response->withStatus(404);
    }
    $response->getBody()->write(json_encode($query));
    $response->withHeader('Content-Type', 'application/json');
    return $response;
});
