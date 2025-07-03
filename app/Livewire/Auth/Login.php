<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
  public $isView = false;
  public $username, $password;
  public function render()
  {
    return view('livewire.auth.login');
  }
  public function openViewPassword()
  {
    $this->isView = true;
  }
  public function closeViewPassword()
  {
    $this->isView = false;
  }
  public function login()
  {
    $credentials = [
      'username' => $this->username,
      'password' => $this->password
    ];
    if (Auth::attempt($credentials)) {
      return redirect()->intended('/dashboard');
    } else {
      $this->addError('authError', 'Invalid username or password');
    }
  }
}
