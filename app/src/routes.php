<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use App\Services\PostService;
use App\Responders\PostResponder;

return function (App $app) {
  // CREATE
  $app->post('/posts', function (Request $request, Response $response) {
    PostService::createPost($request, $this->db, $this->logger);
    return PostResponder::withStatus($response, 201);
  });

  // READ
  $app->get('/posts[/{id}]', function (Request $request, Response $response, array $args) {
    $posts = PostService::getPosts($args, $this->db, $this->logger);
    return PostResponder::withJson($response, $posts);
  });

  // UPDATE
  $app->patch('/posts/{id}', function (Request $request, Response $response, array $args) {
    PostService::updatePost($request, $args, $this->db, $this->logger);
    return PostResponder::withStatus($response, 200);
  });

  // DELETE
  $app->delete('/posts/{id}', function (Request $request, Response $response, array $args) {
    PostService::deletePost($args, $this->db, $this->logger);
    return PostResponder::withStatus($response, 200);
  });
};
