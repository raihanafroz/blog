<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function test() {
    return response()->json(['request' => 'MD. Raihan Afroz'], 200);
  }

  public function login(Request $request) {
    return response()->json(['request' => $request->all()], 200);
  }
}
