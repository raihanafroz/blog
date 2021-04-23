<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request){
    $thumb = $this->getFirstMedia('thumbnail');
    return [
      'id' => $this->id,
      'u_id' => $this->u_id,
      'title' => $this->title,
      'views' => $this->views,
      'like' => $this->like,
      'dislike' => $this->dislike,
      'status' => $this->status,
      'created_at' => $this->created_at,
      'tags_count' => $this->tags_count,
      'tags' => $this->tags->sortBy('id')->pluck('name')->implode(','),
      'author' => $this->author->only('id', 'name', 'email'),
      'category' => $this->category->only('id', 'name'),
//      'thumbnail' => isset($thumb) ? $thumb->getUrl() : null,
      'thumbnail' => $this->getFirstMediaUrl('thumbnail'),
      'images' => $this->getMedia('images'),
    ];
  }
}
