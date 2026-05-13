<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

$user = User::where('username', 'dadi')->first();
if (!$user) {
    echo "User dadi not found\n";
    exit;
}

echo "Testing user: {$user->username} (ID: {$user->id}, Role: {$user->role})\n";
echo "hasPermission('view_user'): " . ($user->hasPermission('view_user') ? 'TRUE' : 'FALSE') . "\n";
echo "hasPermission('view_department'): " . ($user->hasPermission('view_department') ? 'TRUE' : 'FALSE') . "\n";
echo "in_array role: " . (in_array($user->role, ['admin', 'director', 'exd']) ? 'TRUE' : 'FALSE') . "\n";

echo "\nDirect user_roles check:\n";
$roles = DB::table('user_roles')->where('user_id', $user->id)->get();
foreach ($roles as $r) {
    echo "Role ID: {$r->role_id}\n";
    $perms = DB::table('permission_roles')
        ->join('permissions', 'permission_roles.permission_id', '=', 'permissions.id')
        ->where('permission_roles.role_id', $r->role_id)
        ->select('permissions.permission_name')
        ->get();
    foreach ($perms as $p) {
        echo "  - Permission: {$p->permission_name}\n";
    }
}
