<?php
namespace Api\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use Api\Models\Post;

class PostsController {
  protected $db;

  public function __construct (ContainerInterface $container) {
    $this->container = $container->get('db');
  }

  // CREATE method
  public function create (Request $request, Response $response) {
    $formData = $request->getParsedBody();
    $post = new Post;

    $post->title = filter_var($formData['title'], FILTER_SANITIZE_STRING);
    $post->content = filter_var($formData['content'], FILTER_SANITIZE_STRING);

    $post->save();

    return $response;
  }

  // READ method
  public function read (Request $request, Response $response, $args) {
    $id = $args['id'] ?? false;

    $data = $id
      ? Post::find($id)
      : Post::all();

    return $response = $response->withJson($data);
  }

  // UPDATE method
  public function update (Request $request, Response $response, $args) {
    $id = $args['id'];
    $formData = $request->getParsedBody();

    $title = $formData['title'] ?? false;
    $content = $formData['content'] ?? false;

    $post = Post::find($id);
    $title && $post->title = filter_var($title, FILTER_SANITIZE_STRING);
    $content && $post->content = filter_var($content, FILTER_SANITIZE_STRING);
    $post->save();

    return $response;
  }

  // DELETE method
  public function delete (Request $request, Response $response, $args) {
    $id = $args['id'];

    Post::where('id', $id)->delete();

    return $response;
  }
};
