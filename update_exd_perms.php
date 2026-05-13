<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$adminRole = \DB::table('roles')->where('role_name', 'admin')->first();
if (!$adminRole) {
    echo "Admin role not found!\n";
    exit;
}

$exdRole = \DB::table('roles')->where('role_name', 'exd')->first();
if (!$exdRole) {
    echo "EXD role not found in roles table. Inserting it now...\n";
    $exdId = \DB::table('roles')->insertGetId([
        'role_name' => 'exd',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $exdRole = \DB::table('roles')->where('id', $exdId)->first();
}

// get all admin permissions
$adminPerms = \DB::table('permission_roles')->where('role_id', $adminRole->id)->get();

echo "Admin has " . $adminPerms->count() . " permissions.\n";

// give them to EXD
foreach ($adminPerms as $perm) {
    $exists = \DB::table('permission_roles')->where('role_id', $exdRole->id)->where('permission_id', $perm->permission_id)->exists();
    if (!$exists) {
        \DB::table('permission_roles')->insert([
            'role_id' => $exdRole->id,
            'permission_id' => $perm->permission_id
        ]);
    }
}

echo "EXD now has " . \DB::table('permission_roles')->where('role_id', $exdRole->id)->count() . " permissions.\n";

// assign all users with role 'exd' in users table to this role_id in user_roles
$exdUsers = \DB::table('users')->where('role', 'exd')->get();
foreach ($exdUsers as $u) {
    $exists = \DB::table('user_roles')->where('user_id', $u->id)->where('role_id', $exdRole->id)->exists();
    if (!$exists) {
        \DB::table('user_roles')->insert([
            'user_id' => $u->id,
            'role_id' => $exdRole->id
        ]);
    }
}

echo "Assigned " . count($exdUsers) . " EXD users to the new role.\n";
