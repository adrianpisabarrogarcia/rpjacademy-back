<?php
namespace RPJAcademy\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RPJAcademy\Models\Course;
use RPJAcademy\DAOs\WorkshopDao;

class WorkshopController
{
    private $workshopDao;

    public function __construct(WorkshopDao $workshopDao) {
        $this->workshopDao = $workshopDao;
    }

    public function getAllWorkshops(Request $request, Response $response): Response
    {
        $query = $this->workshopDao->findAll();
        if ($query == null || count($query) == 0) {
            $response->getBody()->write("Workshops not found");
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($query));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function getWorkshopById(Request $request, Response $response, array $args): Response
    {
        $query = Course::with('blocks', 'institutions')->find($args['id']);
        if ($query == null) {
            $response->getBody()->write("Workshops not found");
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($query));
        return $response->withHeader('Content-Type', 'application/json');
    }
}