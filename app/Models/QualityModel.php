<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QualityModel extends Model
{
  use HasFactory;
  protected $table = 'qualities';
  protected $guarded = [];
}
