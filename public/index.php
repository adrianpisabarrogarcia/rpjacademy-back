<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

require_once  __DIR__ . '/../controller/courses.php';

$app->run();
