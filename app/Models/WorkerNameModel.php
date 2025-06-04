<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerNameModel extends Model
{
  use HasFactory;
  protected $table = 'worker_names';
  protected $guarded = [];
}
