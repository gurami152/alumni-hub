<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $globalAdmin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Global Admin']);
        $facultyAdmin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Faculty Admin']);
        $alumni = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Alumni']);

        // Create basic permissions
        $permissions = [
            'manage global vacancies',
            'manage global partners',
            'manage faculty alumni',
            'manage faculty events',
            'manage faculty stories',
            'create alumni profile',
            'propose event',
            'propose vacancy',
            'request mentorship'
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }

        $globalAdmin->syncPermissions([
            'manage global vacancies',
            'manage global partners',
        ]);

        $facultyAdmin->syncPermissions([
            'manage faculty alumni',
            'manage faculty events',
            'manage faculty stories',
        ]);

        $alumni->syncPermissions([
            'create alumni profile',
            'propose event',
            'propose vacancy',
            'request mentorship',
        ]);
    }
}
