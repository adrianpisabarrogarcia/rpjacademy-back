<?php

use Slim\Factory\AppFactory;
use Tuupola\Middleware\CorsMiddleware;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//Eloquent configuration
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'port'      => '3306',
    'database'  => 'redpjacademy',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Establece el objeto Capsule globalmente.
$capsule->setAsGlobal();

// Arranca Eloquent.
$capsule->bootEloquent();

//CORS configuration
$app->add(new CorsMiddleware([
    "origin" => ["*"], // Permite a todos los orígenes. Cambia esto para limitarlo a dominios específicos.
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
    "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since", "Content-Type"],
    "headers.expose" => ["Authorization", "Etag"],
    "credentials" => true,
    "cache" => 86400, // Establece la cabecera Access-Control-Max-Age en 86400 segundos = 24 horas
]));

//Base path
$app->setBasePath('/api');

//Routes controllers
require_once __DIR__ . '/../controllers/course.controller.php';
require_once __DIR__ . '/../controllers/workshop.controller.php';

$app->run();
