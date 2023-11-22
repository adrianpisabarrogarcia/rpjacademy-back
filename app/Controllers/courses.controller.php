<?php
namespace RPJAcademy\Controllers;
global $app;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RPJAcademy\Models\Course;
use RPJAcademy\DAOs\CourseDao as CourseDao;

$controllerPath = "/courses";

// TODO: pasar controlador a una clase

$app->get($controllerPath, function (Request $request, Response $response) {
    $courseDao = new CourseDao();
    $query = $courseDao->findAll();
    if ($query == null || count($query) == 0) {
        $response->getBody()->write("Workshops not found");
        return $response->withStatus(404);
    }
    $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode($query));
    return $response;
});

$app->get($controllerPath . '/{id}', callable: function (Request $request, Response $response, $args) {
    $course = new Course();
    $course->id = $args['id'];
    $courseDao = new CourseDao();
    $query = $courseDao->find($course);
    if ($query == null) {
        $response->getBody()->write("Workshops not found");
        return $response->withStatus(404);
    }
    $response->getBody()->write(json_encode($query));
    $response->withHeader('Content-Type', 'application/json');
    return $response;
});
