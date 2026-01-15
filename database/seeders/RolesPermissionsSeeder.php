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

            //Coach
            'edit',
            'create',
            'view reports',
            'export reports',
            'add notes',
            'send notifications',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(attributes: ['name' => $permission]);
        }

        // Roles
        $owner   = Role::firstOrCreate(['name' => 'Owner'], ['name_ar' => 'المالك']);
        $admin   = Role::firstOrCreate(['name' => 'Admin'], ['name_ar' => 'المدير']);
        $finance = Role::firstOrCreate(['name' => 'Finance'], ['name_ar' => 'المحاسب']);
        $support = Role::firstOrCreate(attributes: ['name' => 'Support'], values: ['name_ar' => 'الدعم']);
        $coach = Role::firstOrCreate(attributes: ['name'=> 'Coach'], values: ['name_ar'=> 'المدرب']);
        

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

        $coach->syncPermissions([
            'edit',
            'create',
            'view reports',
            'export reports',
            'add notes',
            'send notifications',

        ]);
    }
}
