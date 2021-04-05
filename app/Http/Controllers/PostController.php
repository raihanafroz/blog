<?php

namespace App\Http\Controllers;

use App\Http\Helper\RedirectWithStatus;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Requests\Admin\StatusRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::with('category:id,u_id,name')->with('author:id,email,name,phone')
      ->withCount('tags')->orderBy('created_at', 'DESC')->paginate(25);
//      $posts = PostResource::collection($posts);
    return view('admin.post.list', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::where('status', 'active')->select('id', 'name')->get();
    $tags = Tag::select('id', 'name')->get();
    return view('admin.post.create', compact('tags', 'categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return RedirectWithStatus
   */
  public function store(PostRequest $request)
  {
    try {
      $data = $request->all();
//      return $data;
      $post = new Post();
      $post->u_id = uniqid('POST-');
      $post->title = $data['title'];
      $post->author_id = auth()->id();
      $post->category_id = $data['category'];
      $post->body = $data['body'];
      $post->status = strtolower($data['status']);
      if ($post->save()) {
        $post->addMediaFromRequest('image')->toMediaCollection();
        return RedirectWithStatus::routeSuccess(
          'admin.post.create',
          '<strong>Congratulations!!! </strong> Post created successfully.'
        );
      }
      return RedirectWithStatus::backWithInput('<strong>Sorry!!! </strong> Post create not possible.');
    } catch (\Exception $e) {
//        return $e;
      return RedirectWithStatus::backWithInputFromException();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    return view('admin.post.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    $categories = Category::where('status', 'active')->select('id', 'name')->get();
    $tags = Tag::select('id', 'name')->get();
    return view('admin.post.update', compact('post', 'categories', 'tags'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\Models\Post $post
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Post $post)
  {
    return $request;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Post $post
   * @return string
   */
  public function destroy(Post $post)
  {
    try {
      if ($post->delete()) {
        return 'success';
      }
    } catch (\Exception $e) {
    }
  }


  /**
   * update the specified resource from storage.
   *
   * @param StatusRequest $request
   * @param \App\Models\Post $post
   * @return string
   */
  public function updateStatus(StatusRequest $request, Post $post)
  {
    $data = $request->all();
    try {
      if ($post->update(['status' => strtolower($data['status'])])) {
        return 'success';
      }
    } catch (\Exception $e) {
    }
  }
}
