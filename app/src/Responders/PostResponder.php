<?php
namespace App\Responders;

use Psr\Http\Message\ResponseInterface as Response;

class PostResponder {
  public function posts (Response $response, $data) {
    return $response->withJson($data);
  }
};
