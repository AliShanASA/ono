<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthService
{
  public function verify($email, $password)
  {
    $user = User::where('email', $email)->first();

    if ($user) {
      if (Hash::check($password, $user->password)) {
        return '203';
      } else {
        return '204';
      }
    } else {
      return '205';
    }
  }

  public function register($username, $email, $password)
  {
    $isEmailExists = User::where('email', $email)->exists();
    if ($isEmailExists) {
      return '201';
    } else {
      try {
        $record = User::create([
          'name' => $username,
          'email' => $email,
          'password' => $password
        ]);
        if ($record) {
          return '202';
        }
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }
  }
}