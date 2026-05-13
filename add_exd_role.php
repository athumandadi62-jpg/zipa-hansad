<?php
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

DB::transaction(function() {
    // 1. Add Role
    $roleId = DB::table('roles')->insertGetId([
        'role_name' => 'exd',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "Created role 'exd' with ID: $roleId\n";

    // 2. Get all 'view' permissions
    $permissions = DB::table('permissions')
        ->where('permission_name', 'LIKE', 'view_%')
        ->get();
    
    // 3. Assign permissions to role
    foreach ($permissions as $p) {
        DB::table('permission_roles')->insert([
            'role_id' => $roleId,
            'permission_id' => $p->id,
        ]);
        echo "Assigned permission: {$p->permission_name}\n";
    }
});
echo "Done!\n";
