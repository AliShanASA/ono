<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Production extends Model
{
  use HasFactory;
  protected $table = 'production';
  protected $guarded = [];
  public function stock()
  {
    return $this->belongsTo(Stock::class);
  }

  public function loom()
  {
    return $this->belongsTo(LoomModel::class);
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }
}
