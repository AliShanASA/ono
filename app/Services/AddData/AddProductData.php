<?php 
namespace App\Services\AddData;
use App\Models\Production;

class AddProductData{
  public function addData($stockId, $loomId, $unitId, $date, $product, $stockQuality){
    try{
      Production::create([
      'stock_id' => $stockId,
      'loom_id' => $loomId,
      'unit_id' => $unitId,
      'quality' => $stockQuality,
      'product' => $product,
      'date' => $date,
    ]);
    return '250';
  } catch(\Exception $e){
    return '251';
  }
}
}