<?php
global $app;

use RPJAcademy\Controllers\CourseController;
use RPJAcademy\Controllers\WorkshopController;
use RPJAcademy\DAOs\CourseDao;
use RPJAcademy\DAOs\WorkshopDao;

// Course Routes
$controller = new CourseController(new CourseDao());
$app->get('/courses', [$controller, 'getAllCourses']);
$app->get('/courses/{id}', [$controller, 'getCourseById']);

// Workshop Routes
$controller = new WorkshopController(new WorkshopDao());
$app->get('/workshops', [$controller, 'getAllWorkshops']);
$app->get('/workshops/{id}', [$controller, 'getWorkshopById']);