<?php
/**
 * Created by PhpStorm V 2017.3.1
 * Author  MD. Raihan Afroz
 * User: Raihan
 * Date: 2/7/2021
 * Time: 9:56 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function login(Request $request) {
    return view('auth.login');
  }

  public function register(Request $request) {
    return view('auth.register');
  }

}
