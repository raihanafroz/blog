<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'posts';
    protected $fillable = [
      'u_id',
      'author_id',
      'category_id',
      'title',
      'views',
      'like',
      'dislike',
      'body',
      'status',
    ];


    public function author() {
      return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function tags() {
      return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function tagsName() {
      return $this->belongsToMany(Tag::class)->with('name');
    }

    public function tagsId() {
      return $this->belongsToMany(Tag::class)->with('id');
    }
}
