<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login(Request $request) {
    return redirect()->route('home');
  }

  public function register(Request $request) {
    return redirect()->route('home');
  }
}
