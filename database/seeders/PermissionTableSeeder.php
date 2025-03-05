<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ];

        foreach ($role_permissions as $permission) {
            Permission::create(['name' => $permission, 'group_name' => 'role']);
        }


        $permission_permissions = [
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
        ];

        foreach ($permission_permissions as $permission) {
            Permission::create(['name' => $permission, 'group_name' => 'permission']);
        }
    }
}
