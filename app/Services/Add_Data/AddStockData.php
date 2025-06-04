<?php 
namespace  App\Services\Add_Data;

use App\Models\Stock;

class AddStockData{
  public function addData($loomId, $unitId, $quantity, $quality, $width, $date, $time, $worker){
    $response = Stock::create([
      'loom_id' => $loomId,
      'unit_id'=> $unitId,
      'inital_quantity' => $quantity, 
      'remaining_quantity' => $quantity,
      'product_produced' => 0, 
      'width' => $width,
      'quality' => $quality,
      'worker_name' => $worker,
      'date' => $date, 
      'time' => $time
    ]);
    if($response){
      return '200';
    } else {
      return '201';
    }
  }
}