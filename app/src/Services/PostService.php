<?php
namespace App\Services;

use Api\Controllers\BaseController;
use Api\Models\Post;

class PostService {
  protected $db;
  protected $logger;

  public function __construct ($db, $logger) {
    $this->db = $db;
    $this->logger = $logger;
  }

  public function getPosts ($args) {
    $id = $args['id'] ?? false;

    $data = $id
      ? Post::find($id)
      : Post::all();

    $this->logger->info("GET '/posts'");
    return $data;
  }
};
