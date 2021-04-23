<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function index() {
    $user = User::where('status', 'inactive')->where('type', 'admin')->first();
//    if (!$user->isActive()){
//      return $user;
//    }
    return view('admin.index');
  }


  public function admin_login_view () {
    return view('admin.auth.login');
  }

  public function admin_login(LoginRequest $request) {
    if ($request->isMethod('POST') && $request->validated()){
      $data = $request->all();
      $user = User::where('email',$data['email'])->first();
      if (isset($user) && !$user->type == 'admin') {
        $status = '<div class="alert alert-warning alert-dismissible show" role="alert">
                <strong>Sorry!!! </strong> You cann\'t login as Admin.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
        return redirect()->route('admin.login')->with('status', $status);

      }
      if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])){
        return redirect()->route('admin.dashboard');
      }
      $status = '<div class="alert alert-warning alert-dismissible show" role="alert">
                <strong>Sorry!!! </strong> Credential not match.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
      return redirect()->route('admin.login')->with('status', $status);
    }
    $status = '<div class="alert alert-warning alert-dismissible show" role="alert">
                <strong>Sorry!!! </strong> Request not supported.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
    return redirect()->route('admin.login')->with('status', $status);
  }
}
