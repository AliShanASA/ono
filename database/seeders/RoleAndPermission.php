<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermission extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $permissions = [
      'dashboard',
      'loom-managemen',
      'filter-by-quality',
      'reports',
      'details-management',
      'warehouse',
      'settings',
    ];

    $roles = ['superadmin', 'admin', 'user'];

    // Create permissions
    foreach ($permissions as $name) {
      Permission::firstOrCreate(['name' => $name]);
    }

    // Create roles
    foreach ($roles as $roleName) {
      Role::firstOrCreate(['name' => $roleName]);
    }

    $superadmin = Role::where('name', 'superadmin')->first();
    $admin = Role::where('name', 'admin')->first();
    $superadmin->syncPermissions(Permission::all());
    $permissionsWithoutLast = array_slice($permissions, 0, -1);
    $admin->syncPermissions($permissionsWithoutLast);
  }
}
