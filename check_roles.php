<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$roles = \DB::table('roles')->get();
foreach ($roles as $r) {
    echo "ID: " . $r->id . " Name: '" . $r->role_name . "'\n";
}
