<?php

use Slim\Factory\AppFactory;
use Tuupola\Middleware\CorsMiddleware;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//Get .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

//Eloquent configuration
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DB_HOST'],
    'port'      => '3306',
    'database'  => $_ENV['DB_NAME'],
    'username'  => $_ENV['DB_USER'],
    'password'  => $_ENV['DB_PASS'],
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

//Routes Controllers
require_once __DIR__ . '/../app/routes.php';

$app->run();
