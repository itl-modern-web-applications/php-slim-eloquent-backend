<?php
namespace Api\Controllers;

use Psr\Container\ContainerInterface;

class BaseController {
  protected $db;
  protected $logger;

  public function __construct (ContainerInterface $container) {
    $this->container = $container->get('db');
    $this->logger = $container->get('logger');
  }
}