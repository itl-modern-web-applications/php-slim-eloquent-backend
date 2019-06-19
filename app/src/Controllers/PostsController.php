<?php
namespace Api\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Api\Controllers\BaseController;
use Api\Models\Post;

class PostsController extends BaseController {
  public function create (Request $request, Response $response) {
    $formData = $request->getParsedBody();
    $post = new Post;

    $post->title = filter_var($formData['title'], FILTER_SANITIZE_STRING);
    $post->content = filter_var($formData['content'], FILTER_SANITIZE_STRING);

    $post->save();

    $this->logger->info("POST '/posts'");
    return $response = $response->withStatus(201);
  }

  public function read (Request $request, Response $response, $args) {
    $id = $args['id'] ?? false;

    $data = $id
      ? Post::find($id)
      : Post::all();

    $this->logger->info("GET '/posts'");
    return $response->withJson($data);
  }

  public function update (Request $request, Response $response, $args) {
    $id = $args['id'];
    $formData = $request->getParsedBody();

    $title = $formData['title'] ?? false;
    $content = $formData['content'] ?? false;

    $post = Post::find($id);
    $title && $post->title = filter_var($title, FILTER_SANITIZE_STRING);
    $content && $post->content = filter_var($content, FILTER_SANITIZE_STRING);
    $post->save();

    $this->logger->info("PATCH '/posts/$id'");
    return $response->withStatus(200);
  }

  public function delete (Request $request, Response $response, $args) {
    $id = $args['id'] ?? null;

    Post::where('id', $id)->delete();

    $this->logger->info("DELETE '/posts/$id'");
    return $response->withStatus(200);
  }
};
