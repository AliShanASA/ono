<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
  use HasFactory;
  protected $table = 'stock';
  protected $guarded = [];

  public function loom()
  {
    return $this->belongsTo(LoomModel::class);
  }
  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }

  public function production()
  {
    return $this->hasMany(Production::class);
  }
  public function deleteStock($id){
    try{
      $stock = Stock::find($id);
    $stock->delete();
    $this->dispatch('toast' , message:'Stock has been deleted successfully', type:'success');
    } catch (\Exception $e) { 
      $this->dispatch('toast', message:'Error occoured while deleting the stock', type:'error');
    }
  }
}
