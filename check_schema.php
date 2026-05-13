<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Table: productstransactionhistory\n";
    print_r(DB::select('DESCRIBE productstransactionhistory'));
    echo "\nTable: stockbatchproducts\n";
    print_r(DB::select('DESCRIBE stockbatchproducts'));
    echo "\nTable: products\n";
    print_r(DB::select('DESCRIBE products'));
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
