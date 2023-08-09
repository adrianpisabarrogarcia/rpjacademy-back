<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Tuupola\Middleware\CorsMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();
$app->add(new CorsMiddleware([
    "origin" => ["*"], // Permite a todos los orígenes. Cambia esto para limitarlo a dominios específicos.
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
    "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since", "Content-Type"],
    "headers.expose" => ["Authorization", "Etag"],
    "credentials" => true,
    "cache" => 86400, // Establece la cabecera Access-Control-Max-Age en 86400 segundos = 24 horas
]));

$app->setBasePath('/api');

require_once  __DIR__ . '/../controller/courses.php';

$app->run();