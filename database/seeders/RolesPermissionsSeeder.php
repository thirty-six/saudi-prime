<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions List
        $permissions = [            
            // Admin
            'edit',
            'create',
            'view reports',
            'export reports',
            'change status',

            // Finance
            'edit payment',
            'export revenue reports',

            // Support
            'add notes',
            'send notifications',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $owner   = Role::firstOrCreate(['name' => 'Owner'], ['name_ar' => 'المالك']);
        $admin   = Role::firstOrCreate(['name' => 'Admin'], ['name_ar' => 'المدير']);
        $finance = Role::firstOrCreate(['name' => 'Finance'], ['name_ar' => 'المحاسب']);
        $support = Role::firstOrCreate(['name' => 'Support'], ['name_ar' => 'الدعم']);

        // Owner gets everything
        $owner->syncPermissions(Permission::all());

        // Assign Permissions
        $admin->syncPermissions([
            'edit',
            'create',
            'view reports',
            'export reports',
            'change status',
        ]);

        $finance->syncPermissions([
            'edit payment',
            'export revenue reports',
        ]);

        $support->syncPermissions([
            'add notes',
            'send notifications'
        ]);
    }
}
