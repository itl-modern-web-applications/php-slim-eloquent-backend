<?php
namespace App\Responders;

class PostResponder {
  public static function withStatus ($response, $status) {
    return $response->withStatus($status);
  }

  public static function withJson ($response, $data) {
    return $response->withJson($data);
  }
};
