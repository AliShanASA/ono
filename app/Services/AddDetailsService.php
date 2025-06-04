<?php
namespace App\Services;

use App\Models\QualityModel;
use App\Models\WorkerNameModel;

class AddDetailsService
{
  public function addQuality($quality)
  {
    $response = QualityModel::create([
      'quality' => $quality,
    ]);
    if ($response) {
      return '200';
    } else {
      return '201';
    }
  }
  public function addWorkerName($worker_name)
  {
    $response = WorkerNameModel::create([
      'worker_name' => $worker_name
    ]);
    if ($response) {
      return '202';
    } else {
      return '203';
    }
  }
}