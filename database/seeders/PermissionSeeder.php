<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all permissions
        $permissions = [
            'View Dashboard',
            'Manage Roles',
            'Manage Permissions',
            'Manage Users',
            'Add User',
            'Edit User',
            'View User',
            'Delete User',
            'Manage Trash User',

            'Manage Projects',
            'Add Project',
            'Edit Project',
            'View Project',
            'Delete Project',
            'Assign Project',
            'Update Project Progress',
            'Update Project Credentials',
            'Comment on Project',

            'Manage Clients',
            'Add Client',
            'Edit Client',
            'View Client',
            'Delete Client',

            'Manage Teams',
            'Add Team',
            'Edit Team',
            'View Team',
            'Delete Team',
            'View Team Members',

            'Manage Transactions',
            'Add Transaction',
            'Edit Transaction',
            'View Transaction',
            'Delete Transaction',

            'Manage Invoices',
            'View Invoice',
            'Send Invoice',
            'Pay With PayPal',
            'PayPal Success',
            'PayPal Cancel',
            'Invoice Template',
            'Invoice Information',
            'Invoice Client',
            'Invoice Users',
            'Invoice Payment',

            'Manage Jobs',
            'View Jobs',

            'Manage Time and Attendance',
            'Check In',
            'Check Out',
            'Submit Leave',
            'View Leaves',
            'Update Leave Status',

            'Manage Chat',
            'View Chat',
            'Start Chat',
            'Send Chat Message',
            'Mark Chat Read',
            'Send Chat Audio',
            'Send Chat Document',

            'Manage Meetings',
            'Add Meeting',
            'View Meeting',
        ];

        // ✅ Create all permissions first
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // ✅ Create roles
        $roles = ['Super Admin', 'Admin', 'Developer', 'Outside Developer'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // ✅ Assign permissions safely
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        $adminRole = Role::where('name', 'Admin')->first();
        $developerRole = Role::where('name', 'Developer')->first();
        $outsideDevRole = Role::where('name', 'Outside Developer')->first();

        $superAdminRole->syncPermissions(Permission::all());
        $adminRole->syncPermissions(Permission::all());

        $developerPermissions = [
            'View Dashboard',
            'Manage Projects',
            'Add Project',
            'Edit Project',
            'View Project',
            'Comment on Project',
            'Manage Clients',
            'View Client',
            'Manage Chat',
            'View Chat',
            'Start Chat',
            'Send Chat Message',
            'Mark Chat Read',
            'Manage Time and Attendance',
            'Check In',
            'Check Out',
            'Submit Leave',
            'View Leaves',
        ];
        $developerRole->syncPermissions($developerPermissions);

        $outsideDevPermissions = [
            'View Dashboard',
            'View Project',
            'Comment on Project',
            'View Client',
            'View Chat',
            'Send Chat Message',
        ];
        $outsideDevRole->syncPermissions($outsideDevPermissions);


        $superAdminUser = User::find(1);
        if ($superAdminUser) {
            $superAdminUser->syncRoles($superAdminRole);
        }

        
        $adminUser = User::find(2);
        if ($adminUser) {
            $adminUser->syncRoles($adminRole);
        }


        $this->command->info('Permissions seeded successfully!');
    }
}
