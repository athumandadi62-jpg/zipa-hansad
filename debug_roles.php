<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

ob_start();

$users = DB::table('users')->select('id', 'username', 'role')->orderBy('id', 'desc')->get();
echo "ALL USERS:\n";
foreach ($users as $u) {
    echo "ID: {$u->id}, Username: {$u->username}, Role: '{$u->role}'\n";
    // Also check user_roles table
    $ur = DB::table('user_roles')->where('user_id', $u->id)->first();
    if ($ur) {
        $roleName = DB::table('roles')->where('id', $ur->role_id)->value('role_name');
        echo "  - user_roles: RoleID {$ur->role_id} ({$roleName})\n";
    } else {
        echo "  - user_roles: NO ROLE MAPPED\n";
    }
}

$roles = DB::table('roles')->get();
echo "\nROLES AND PERMISSIONS:\n";
foreach ($roles as $r) {
    echo "Role: {$r->role_name} (ID: {$r->id})\n";
    $permissions = DB::table('permission_roles')
        ->join('permissions', 'permission_roles.permission_id', '=', 'permissions.id')
        ->where('permission_roles.role_id', $r->id)
        ->pluck('permission_name');
    foreach ($permissions as $p) {
        echo "  - {$p}\n";
    }
}

$content = ob_get_clean();
file_put_contents('debug_output.txt', $content);
echo "Done. Results in debug_output.txt\n";
