<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Size;
use App\Models\Pcd;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'Hussein Mcheni',
                'username' => 'mcheni',
                'email' => 'admin@gmail.com',
                'phone_number' => '255657193660',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'status' => 'active',
                'address' => 'Mbagara',
            ],
            [
                'full_name' => 'Fahmy',
                'username' => 'TAI',
                'email' => 'fahmy@gmail.com',
                'phone_number' => '+255762223264',
                'password' => Hash::make('22TAI20'),
                'role' => 'admin',
                'status' => 'active',
                'address' => 'Kinondoni',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            
            // Retrieve the admin role
            $adminRole = Role::where('role_name', 'admin')->first();
            
            // Attach the admin role to the created user
            if ($adminRole) {
                $user->roles()->attach($adminRole);
            }
        }

        /*
        // Seed the Size table
        $sizes = [13, 14, 15, 16, 17, 18, 19, 20];
        foreach ($sizes as $size) {
            Size::create([
                'name' => (string) $size,
                'createdby' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'companyid' => 1,
                'status' => 1,
            ]);
        }
        */

   
    }
}
