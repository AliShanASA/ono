<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;


class AuthController extends Controller
{
  public function login(Request $request, AuthService $authService)
  {
    $response = $authService->verify($request->email, $request->password);
    return response()->json($response);
  }

  public function register(Request $request, AuthService $authService)
  {
    $response = $authService->register($request->name, $request->email, $request->password);
    return response()->json($response);
  }
}
