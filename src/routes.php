<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {

    $app->post('/cultivos','funcionInsertarPlanta');
    $app->post('/registro','funcionInsertarRegistro');
    $app->post('/zonas','funcionInsertarZona');
    $app->post('/antenas','funcionInsertarAntena');
    $app->post('/plantazona','funcionInsertarPlantaZona');
    $app->get('/cultivos','funcionConsultaDatos');
    $app->delete('/cultivos','funcionDeletePlanta');
    $app->delete('/zonas','funcionDeleteZona');
    $app->delete('/antenas','funcionDeleteAntena');
    $app->put('/cultivos','funcionUpdatePlanta');
    $app->put('/antenas','funcionUpdateAntena');
});
