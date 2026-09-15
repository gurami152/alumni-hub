<?php

namespace Znu\ModuleAlumni\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AlumniPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view_alumni',
            'create_alumni',
            'edit_alumni',
            'delete_alumni',
            'view_all_alumni_records', // For HierarchicalDataScope
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
