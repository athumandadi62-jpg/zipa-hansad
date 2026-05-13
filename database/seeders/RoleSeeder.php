<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Define all permissions grouped by module
        $permissions = [
            'User Management' => ['view_user', 'add_user', 'edit_user', 'delete_user'],
            'Department Management' => ['view_department', 'add_department', 'edit_department', 'delete_department'],
            'Product Management' => ['view_product', 'add_product', 'edit_product', 'delete_product', 'view_category'],
            'Inventory' => ['view_store', 'manage_store', 'view_stock'],
            'Requests' => [
                'request_item', 
                'view_my_requests', 
                'approve_hod_requests', 
                'approve_hr_requests',
                'view_approved_requests'
            ],
            'Reports' => ['view_reports'],
            'Dashboard' => ['view_dashboard', 'view_real_total'],
        ];

        // 2. Create Permissions
        $allPermissionIds = [];
        foreach ($permissions as $group => $perms) {
            foreach ($perms as $permName) {
                $permission = Permission::firstOrCreate(
                    ['permission_name' => $permName],
                    ['group_name' => $group]
                );
                $allPermissionIds[$permName] = $permission->id;
            }
        }

        // 3. Define Roles
        $roles = [
            'admin' => $allPermissionIds, // All permissions
            
            'director' => [ // Executive Director (View everything, no modify)
                'view_dashboard', 'view_real_total', 
                'view_user', 'view_department', 
                'view_product', 'view_category', 
                'view_store', 'view_stock', 
                'view_reports', 'view_approved_requests'
            ],
            
            'store_keeper' => [
                'view_dashboard', 
                'view_product', 
                'view_store', 'manage_store', 'view_stock',
                'view_approved_requests'
            ],
            
            'hr' => [
                'view_dashboard', 
                'request_item', 'view_my_requests',
                'view_store', // View store items without edit
                'approve_hr_requests', 
                'view_user', // HR needs user access usually
            ],
            
            'user' => [
                'request_item', 'view_my_requests'
            ],
            
            'staff' => [ // Staff for Q&A system
                'view_dashboard',
            ],
        ];

        // 4. Create Roles & Sync Permissions
        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['role_name' => $roleName]);
            
            $permissionIds = [];
            foreach ($perms as $p) {
                if (is_numeric($p)) {
                    $permissionIds[] = $p;
                } else {
                    // Try to find ID by name
                     $perm = Permission::where('permission_name', $p)->first();
                     if($perm) $permissionIds[] = $perm->id;
                }
            }
            $role->permissions()->sync($permissionIds);
        }
    }
}
