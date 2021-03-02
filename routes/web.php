<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//  $statement = DB::select("SHOW TABLE STATUS LIKE 'users'");
//  $nextId = $statement[0]->Auto_increment;
//  $nextId = uniqid('OPD', true);
//  $val = str_pad($nextId, 7, '000000', STR_PAD_LEFT);
//  return '1201' . $val;
//  $user = \App\Models\User::first();
//  return $user;
  return view('site.index');
})->name('home');

Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');


Route::get('/xadmin', [AdminController::class, 'admin_login_view'])->name('admin.login');
Route::post( '/xadmin', [AdminController::class, 'admin_login'])->name('admin.login');
Route::middleware(['auth', 'is_active'])->group(function () {
  Route::prefix('admin')->name('admin.')->middleware('is_admin')->group(function () {

    Route::get('/logout', function () {
      Auth::logout();
      return redirect()->route('login');
    })->name('logout');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('update')->name('update.')->group(function () {
      Route::match(['get', 'post'], '/profile', [UserController::class, 'update_profile'])->name('profile');
      Route::match(['get', 'post'], '/password', [UserController::class, 'update_password'])->name('password');
    });


    #ajax
    Route::prefix('ajax')->name('ajax.')->group(function () {
      Route::post('/update/user/status', [AdminController::class, 'ajax_update_user_status'])->name('update.user.status');
      Route::post('/update/categories/status/{category}', [CategoryController::class, 'updateStatus'])->name('update.categories.status');
    });

    #Category
    Route::resource('categories', CategoryController::class);

    #Tag
    Route::resource('tag', TagController::class);

    #User
    Route::prefix('user')->name('user.')->group(function () {
      Route::match(['get', 'post'], '/add', [AdminController::class, 'add_user'])->name('add');
      Route::match(['get', 'post'], '/view', [AdminController::class, 'view_user'])->name('view');
      Route::match(['get', 'post'], '/edit/{id}', [AdminController::class, 'edit_user'])->name('edit');
      Route::delete('/delete', [AdminController::class, 'delete_user'])->name('delete');
    });

  });
});