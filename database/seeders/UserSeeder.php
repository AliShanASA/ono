<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

  public function run(): void
  {
    $adminUser = User::create(
      [
        'username' => 'superadmin',
        'password' => Hash::make('admin123'),
      ]
    );
    $adminUser->assignRole('superadmin');
  }
}
