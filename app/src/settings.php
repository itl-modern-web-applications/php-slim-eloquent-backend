<?php
return [
  'settings' => [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,

    'db' => [
      'driver' => 'mysql',
      'host' => 'localhost',
      'database' => 'api',
      'username' => 'root',
      'password' => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
    ],

    'logger' => [
      'name' => 'slim-app',
      'path' => __DIR__ . '/../../logs/app.log',
      'level' => Monolog\Logger::DEBUG
    ]
  ]
];
