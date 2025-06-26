<?php 
namespace App\Services\AddData;
use App\Models\Production;

class AddProductData{
  public function addData($stockId, $loomId, $unitId, $date, $product){
    try{
      Production::create([
      'stock_id' => $stockId,
      'loom_id' => $loomId,
      'unit_id' => $unitId,
      'product' => $product,
      'date' => $date,
    ]);
    return '250';
  } catch(\Exception $e){
    return '251';
  }
}
}