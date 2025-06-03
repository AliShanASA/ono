<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
  public $viewComponenet = 'Dashboard';

  public function setViewComponent($text)
  {
    $this->viewComponenet = $text;
  }
  public function render()
  {
    return view('livewire.home');
  }
}
