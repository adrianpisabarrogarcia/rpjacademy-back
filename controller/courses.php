<?php

global $app;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$controllerPrincipalUrl = "/courses";
$data = [
        [
            'id' => 1,
            'name' => 'Angular',
            'description' => 'Angular is a platform for building mobile and desktop web applications.',
            'price' => 200,
            'imageUrl' => 'https://repository-images.githubusercontent.com/24195339/87018c00-694b-11e9-8b5f-c34826306d36',
            'isAvailable' => true,
            'category' => 'WEB'
        ],
        [
            'id' => 2,
            'name' => 'React',
            'description' => 'React is a JavaScript library for building user interfaces.',
            'price' => 150,
            'imageUrl' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1200px-React-icon.svg.png',
            'isAvailable' => true,
            'category' => 'WEB'
        ],
        [
            'id' => 3,
            'name' => 'Angular',
            'description' => 'Angular is a platform for building mobile and desktop web applications.',
            'price' => 200,
            'imageUrl' => 'https://repository-images.githubusercontent.com/24195339/87018c00-694b-11e9-8b5f-c34826306d36',
            'isAvailable' => true,
            'category' => 'WEB'
        ],
        [
            'id' => 4,
            'name' => 'React',
            'description' => 'React is a JavaScript library for building user interfaces.',
            'price' => 150,
            'imageUrl' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1200px-React-icon.svg.png',
            'isAvailable' => true,
            'category' => 'WEB'
        ],
        [
            'id' => 5,
            'name' => 'React',
            'description' => 'React is a JavaScript library for building user interfaces.',
            'price' => 150,
            'imageUrl' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1200px-React-icon.svg.png',
            'isAvailable' => true,
            'category' => 'WEB'
        ]
    ];

$app->get($controllerPrincipalUrl . '/all', function (Request $request, Response $response, $args) {
    //error_log("Courses list");
    // Get request parameters

    global $data;
    $params = $request->getQueryParams();
    //$hola = $params['hola'];


    // Convert the associative array to a JSON string
    $jsonObject = json_encode($data);

    // Set the Content-Type header to application/json to send JSON response
    $response->withHeader('Content-Type', 'application/json');
    // Write the JSON string as the response body
    $response->getBody()->write($jsonObject);
    return $response;
});

