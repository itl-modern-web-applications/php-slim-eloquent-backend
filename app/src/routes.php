<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
  $app->post('/posts', function (Request $request, Response $response, array $args) {
    $posts = $this->post_service->getPosts($args);
    return $this->post_responder->posts($response, $posts);
  });
};
