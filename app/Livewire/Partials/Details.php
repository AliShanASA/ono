<?php

namespace App\Livewire\Partials;

use App\Services\AddDetailsService;
use Livewire\Component;

class Details extends Component
{

  public $quality, $worker_name, $response;
  public function render()
  {
    return view('livewire.partials.details');
  }
  public function addQuality(AddDetailsService $addDetailsService)
  {
    $this->response = $addDetailsService->addQuality($this->quality);
    if ($this->response === '200') {
      $this->quality = '';
    }

  }
  public function addWorkerName(AddDetailsService $addDetailsService)
  {
    $this->response = $addDetailsService->addWorkerName($this->worker_name);
    if ($this->response === '203') {
      $this->worker_name = '';
    }
  }
}
