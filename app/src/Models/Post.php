<?php
namespace Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
  use SoftDeletes;

  protected $table = 'posts';
  protected $fillable = ['title', 'content'];
}