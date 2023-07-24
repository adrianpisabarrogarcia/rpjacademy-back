<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/courses', function (Request $request, Response $response, $args) {

    // Get request parameters
    $params = $request->getQueryParams();
    //$hola = $params['hola'];
    //echo $hola;

    // Sample data to be converted to JSON
    $data = array(
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john.doe@example.com',
        'is_subscribed' => true,
        'address' => array(
            'street' => '123 Main Street',
            'city' => 'New York',
            'zip' => '10001'
        )
    );
    // Convert the associative array to a JSON string
    $jsonObject = json_encode($data);

    // Set the Content-Type header to application/json to send JSON response
    $response->withHeader('Content-Type', 'application/json');
    // Write the JSON string as the response body
    $response->getBody()->write($jsonObject);
    return $response;
});

