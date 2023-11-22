<?php
namespace RPJAcademy\Controllers;
global $app;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RPJAcademy\Models\Course;
use RPJAcademy\DAOs\WorkshopDao;

$controllerPath = "/workshops";

// TODO: pasar controlador a una clase


$app->get($controllerPath, function (Request $request, Response $response) {
    $workshopDao = new WorkshopDao();
    $query = $workshopDao->findAll();
    if ($query == null || count($query) == 0) {
        $response->getBody()->write("Workshops not found");
        return $response->withStatus(404);
    }
    $response->getBody()->write(json_encode($query));
    $response->withHeader('Content-Type', 'application/json');
    return $response;
});

$app->get($controllerPath . '/{id}', function (Request $request, Response $response, $args) {
    $query = Course::with('blocks', 'institutions')->find($args['id']);
    if ($query == null) {
        $response->getBody()->write("Workshops not found");
        return $response->withStatus(404);
    }
    $response->getBody()->write(json_encode($query));
    $response->withHeader('Content-Type', 'application/json');
    return $response;
});