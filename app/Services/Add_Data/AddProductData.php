<?php 
namespace App\Services\Add_Data;
use App\Models\Production;

class AddProductData{
  public function addData($stockId, $loomId, $unitId, $date, $product){
    $response = Production::create([
      'stock_id' => $stockId,
      'loom_id' => $loomId,
      'unit_id' => $unitId,
      'product' => $product,
      'date' => $date,
    ]);
    if($response){
      return '250';
    } else {
      return '251';
    }
  }
}