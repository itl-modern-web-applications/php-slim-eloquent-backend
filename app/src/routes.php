<?php
use Slim\App;
use Api\Controllers\PostsController;

return function (App $app) {
  $app->post('/posts', PostsController::class . ':create');
  $app->get('/posts[/{id}]', PostsController::class . ':read');
  $app->patch('/posts/{id}', PostsController::class . ':update');
  $app->delete('/posts/{id}', PostsController::class . ':delete');
};
