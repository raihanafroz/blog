<?php

namespace App\Http\Controllers;

use App\Http\Helper\RedirectWithStatus;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\StatusRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::orderby('created_at', 'DESC')->get();
    return view('admin.category.list', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.category.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return RedirectWithStatus
   */
  public function store(CategoryRequest $request)
  {
    $data = $request->all();
    try {
      $category = new Category();
      $category->u_id = uniqid('CAT-');
      $category->name = $data['name'];
      $category->status = strtolower($data['status']);
      if ($category->save()) {
        return RedirectWithStatus::routeSuccess(
          'admin.categories.create',
          '<strong>Congratulations!!! </strong> Category created successfully.'
        );
      }
      return RedirectWithStatus::backWithInput('<strong>Sorry!!! </strong> Category create not possible.');
    } catch (\Exception $e) {
      return RedirectWithStatus::backWithInputFromException();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    return view('admin.category.show', compact('category'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('admin.category.update', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\Models\Category $category
   * @return RedirectWithStatus
   */
  public function update(CategoryRequest $request, Category $category)
  {
    try {
      $data = $request->all();
      $updateData = [
        'name' => $data['name'],
        'status' => strtolower($data['status'])
      ];
      if ($category->update($updateData)) {
        return RedirectWithStatus::routeSuccess(
          'admin.categories.index',
          '<strong>Congratulations!!! </strong> Category updated successfully.'
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
   * @param  \App\Models\Category $category
   * @return string
   */
  public function destroy(Category $category)
  {
    try {
      if ($category->delete()) {
        return 'success';
      }
    } catch (\Exception $e) {
    }
  }


  /**
   * update the specified resource from storage.
   *
   * @param StatusRequest $request
   * @param  \App\Models\Category $category
   * @return string
   */
  public function updateStatus(StatusRequest $request, Category $category)
  {
    $data = $request->all();
    try {
      if ($category->update(['status' => strtolower($data['status'])])) {
        return 'success';
      }
    } catch (\Exception $e) {
    }
  }
}
