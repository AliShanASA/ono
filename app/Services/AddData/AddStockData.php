<?php 
namespace  App\Services\AddData;

use App\Models\Stock;

class AddStockData{
  public function addData($loomId, $unitId, $quantity, $quality, $width, $date, $time, $worker){
    try{
      Stock::create([
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
    return true;
  } catch(\Exception $e){
    return false;
  }

  }
}