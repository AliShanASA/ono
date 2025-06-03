<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Loom;

class LoomSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $units = Unit::all();
    foreach ($units as $unit) {
      for ($i = 0; $i < 8; $i++) {
        Loom::create([
          'unit_id' => $unit->id,
        ]);
      }
    }
  }
}
