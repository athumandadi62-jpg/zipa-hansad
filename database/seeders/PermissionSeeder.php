<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the permissions
        // Define permissions with groups
        $permissions = [
            'User Management' => [
                'Admin access',
                'adding new user',
                'User management',
                'disabling user',
                'managing roles',
                'adding roles to user',
            ],
            'System' => [
                'auditing system and activities',
            ],

              'product' => [
                'adding product',
                'viewing product',
                'updating product',
                'deleting product',
            ],
        
            'Contract Management' => [
                'adding contract',
                'view contract',
                'approve contract',
                'extend contract',
                'terminate contract',
                'resend contract',
                 'viewing contract',
            ],
            'Consultant Management' => [
                'adding consultant',
                'viewing consultant',
            ],
            'Reports' => [
                'viewing report',
            ],
        ];

        // Seed the permissions
        foreach ($permissions as $group => $perms) {
            foreach ($perms as $permissionName) {
                Permission::updateOrCreate(
                    ['permission_name' => $permissionName],
                    ['group_name' => $group]
                );
            }
        }
    }
}
