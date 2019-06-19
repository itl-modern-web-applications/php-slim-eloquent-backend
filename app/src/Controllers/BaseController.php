<?php
namespace Api\Controllers;

use Psr\Container\ContainerInterface;

class BaseController {
  protected $db;

  public function __construct (ContainerInterface $container) {
    $this->container = $container->get('db');
  }
}