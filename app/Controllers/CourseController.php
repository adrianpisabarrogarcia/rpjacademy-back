<?php

namespace RPJAcademy\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RPJAcademy\Models\Course;
use RPJAcademy\DAOs\CourseDao;

class CourseController
{
    private $courseDao;

    public function __construct(CourseDao $courseDao) {
        $this->courseDao = $courseDao;
    }

    public function getAllCourses(Request $request, Response $response): Response
    {
        $query = $this->courseDao->findAll();
        if ($query == null || count($query) == 0) {
            $response->getBody()->write("Workshops not found");
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($query));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function getCourseById(Request $request, Response $response, array $args): Response
    {
        $course = new Course();
        $course->id = $args['id'];
        $query = $this->courseDao->find($course);
        if ($query == null) {
            $response->getBody()->write("Workshops not found");
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($query));
        return $response->withHeader('Content-Type', 'application/json');
    }
}