<?php
use Slim\App;
use App\Services\PostService;
use App\Responders\PostResponder;

return function (App $app) {
  $container = $app->getContainer();

  $container['post_service'] = function ($c) {
    return new PostService($c['db'], $c['logger']);
  };

  $container['post_responder'] = function ($c) {
    return new PostResponder();
  };
};
