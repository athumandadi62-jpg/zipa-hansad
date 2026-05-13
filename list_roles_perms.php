<?php
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$roles = DB::table('roles')->get();
$output = "ROLES:\n";
foreach ($roles as $r) {
    $output .= "ID: {$r->id} | NAME: {$r->role_name}\n";
}

$permissions = DB::table('permissions')->get();
$output .= "\nPERMISSIONS:\n";
foreach ($permissions as $p) {
    $output .= "ID: {$p->id} | NAME: {$p->permission_name} | GROUP: {$p->group_name}\n";
}

file_put_contents('roles_perm_info.txt', $output);
echo "Written to roles_perm_info.txt\n";
