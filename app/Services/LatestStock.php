<?php
namespace App\Services;
use App\Models\Stock;

class LatestStock
{
  public function getLatestStock($unitId, $loomId)
  {
    $data = Stock::where('unit_id', $unitId)->where('loom_id', $loomId)->latest('date');
    return $data;
  }
}