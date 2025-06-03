<?php

namespace App\Livewire;

use App\Services\AuthService;
use Livewire\Component;

class Login extends Component
{
  public $newEmail;
  public $newPassword;
  public $isRegister = false;
  public $isView = false;
  public $registerName;
  public $registerEmail;
  public $registerPassword;
  public $response;
  public function render()
  {
    return view('livewire.login');
  }
  public function openRegister()
  {
    $this->response = '';
    $this->isRegister = true;
  }
  public function closeRegister()
  {
    $this->response = '';
    $this->isRegister = false;
  }

  public function openViewPassword()
  {
    $this->isView = true;
  }
  public function closeViewPassword()
  {

    $this->isView = false;
  }

  public function verify(AuthService $authService)
  {
    $this->response = '';
    $user = $authService->verify($this->newEmail, $this->newPassword);
    $this->response = $user;
    if ($user == '203') {
      $this->newEmail = '';
      $this->newPassword = '';
      return redirect('/home');
    }
  }

  public function register(AuthService $authService)
  {
    $this->response = '';
    $record = $authService->register($this->registerName, $this->registerEmail, $this->registerPassword);
    if ($record == '202') {
      $this->registerName = '';
      $this->registerEmail = '';
      $this->registerPassword = '';
    }
    $this->response = $record;
  }
}
