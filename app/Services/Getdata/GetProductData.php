<?php 
namespace App\Services\Getdata;

use App\Models\Production;
use Carbon\Carbon;

class GetProductData{
  public function getData($stockId){
    try{
    $data = Production::where('stock_id', $stockId)
    ->where('date', '>=', Carbon::now()->subDays(7)->toDateString())
    ->get();
    return $data;
    } catch(\Exception $e){
      return null;
    }
  }
} 