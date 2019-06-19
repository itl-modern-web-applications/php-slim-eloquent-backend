<?php
use Slim\App;
use Illuminate\Contracts\Debug\ExceptionHandler as Exception;
use Api\Classes\DatabaseExceptionsHandler as Handler;

return function (App $app) {
  $container = $app->getContainer();

  $container['db'] = function ($c) {
    $capsule = new Illuminate\Database\Capsule\Manager;

    $capsule->addConnection($c->get('settings')['db']);
    $capsule->getContainer()->singleton(Exception::class, Handler::class);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
  };

  $container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];

    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
  };
};
