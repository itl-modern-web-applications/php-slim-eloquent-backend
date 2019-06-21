<?php
namespace App\Services;

use App\Models\Post;

class PostService {
  // CREATE
  public static function createPost ($request, $db, $logger) {
    $data = $request->getParsedBody();

    $post = new Post;
    $post->title = filter_var($data['title'], FILTER_SANITIZE_STRING);
    $post->content = filter_var($data['content'], FILTER_SANITIZE_STRING);
    $post->save();

    $logger->info("POST '/posts'");
  }

  // READ
  public static function getPosts ($args, $db, $logger) {
    $id = $args['id'] ?? false;

    $data = $id
      ? Post::find($id)
      : Post::all();

    $logger->info("GET '/posts" . $id ? "/$id'" : "'");
    return $data;
  }

  // UPDATE
  public static function updatePost ($request, $args, $db, $logger) {
    $id = $args['id'];
    $data = $request->getParsedBody();

    $title = $data['title'] ?? false;
    $content = $data['content'] ?? false;

    $post = Post::find($id);
    $title && $post->title = filter_var($title, FILTER_SANITIZE_STRING);
    $content && $post->content = filter_var($content, FILTER_SANITIZE_STRING);
    $post->save();

    $logger->info("PATCH '/posts/$id'");
  }

  // DELETE
  public static function deletePost ($args, $db, $logger) {
    Post::where('id', $args['id'])->delete();

    $logger->info("DELETE '/posts/" . $args['id'] . "'");
  }
};
