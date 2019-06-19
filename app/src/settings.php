<?php
return [
  'settings' => [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,

    // Config for illuminate/database dependency
    'db' => [
      'driver' => 'mysql',
      'host' => 'localhost',
      'database' => 'api',
      'username' => 'root',
      'password' => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
    ]
  ]
];
