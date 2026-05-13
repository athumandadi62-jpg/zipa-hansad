<?php
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$categories = DB::table('product_categories')->get();
$output = "ALL CATEGORIES:\n";
foreach ($categories as $c) {
    $output .= "ID: {$c->id} | NAME: {$c->name}\n";
}
file_put_contents('fuel_info.txt', $output);
echo "Written to fuel_info.txt\n";
