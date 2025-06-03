<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoomModel extends Model
{
  use HasFactory;
  protected $table = 'loom';
  protected $guarded = [];
  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }
  public function stock()
  {
    return $this->hasMany(Stock::class);
  }
}
