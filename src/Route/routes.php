<?php

use LinuxControlApi\Controller\Power;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/power/restart', function (Request $request, Response $response) {
     $result = (new Power())->restart();
     return $response->withJson($result);
});