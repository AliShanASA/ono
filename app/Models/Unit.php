<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
  use HasFactory;
  protected $table = 'unit';
  protected $guarded = [];

  public function loom()
  {
    return $this->hasMany(LoomModel::class);
  }
}
