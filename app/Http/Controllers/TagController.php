<?php

namespace App\Http\Controllers;

use App\Http\Helper\RedirectWithStatus;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Database\QueryException;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tags = Tag::select('id', 'name', 'created_at')->orderby('created_at', 'DESC')->paginate(20);
      return view('admin.tag.list', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectWithStatus
     */
    public function store(TagRequest $request)
    {
      $data = $request->all();
      try {
        $tag = new Tag();
        $tag->name = $data['name'];
        if ($tag->save()) {
          return RedirectWithStatus::routeSuccess(
            'admin.tag.create',
            '<strong>Congratulations!!! </strong> Tag created successfully.'
          );
        }
        return RedirectWithStatus::backWithInput('<strong>Sorry!!! </strong> Tag create not possible.');
      } catch (\Exception $e) {
        return RedirectWithStatus::backWithInputFromException();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
      return view('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
      return view('admin.tag.update', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return RedirectWithStatus
     */
    public function update(TagRequest $request, Tag $tag)
    {
      try {
        $data = $request->all();
        $updateData = [
          'name' => $data['name'],
        ];
        if ($tag->update($updateData)) {
          return RedirectWithStatus::routeSuccess(
            'admin.tag.index',
            '<strong>Congratulations!!! </strong> Tag updated successfully.'
          );
        }
        return RedirectWithStatus::backWithInput();
      } catch (QueryException $e) {
        return RedirectWithStatus::backWithInputFromException();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return string
     */
    public function destroy(Tag $tag)
    {
      try {
        if ($tag->delete()) {
          return 'success';
        }
      } catch (\Exception $e) {
      }
    }
}
