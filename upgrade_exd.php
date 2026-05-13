<?php

$paths = [
    'resources/views/layout/partials/sidebar.blade.php',
    'resources/views/pages/admin/users.blade.php',
    'resources/views/pages/admin/products/product-list.blade.php',
    'resources/views/pages/admin/orders/order-list.blade.php',
    'resources/views/pages/admin/expenses/expense-list.blade.php',
    'resources/views/pages/admin/departments/list-department.blade.php',
    'resources/views/components/breadcrumb.blade.php',
    'app/Http/Controllers/OrderController.php'
];

foreach ($paths as $path) {
    if (file_exists($path)) {
        $content = file_get_contents($path);
        
        // Remove the `!== 'exd'` check in views by replacing with dummy string
        $content = str_replace("!== 'exd'", "!== 'exd_readonly'", $content);
        
        // Add EXD to in_array checks that contain 'admin' but not 'exd'
        // For OrderController.php
        $content = str_replace("['hr', 'admin', 'director']", "['hr', 'admin', 'director', 'exd']", $content);
        $content = str_replace("['hod', 'admin', 'director']", "['hod', 'admin', 'director', 'exd']", $content);
        $content = str_replace("['store_keeper', 'admin', 'director']", "['store_keeper', 'admin', 'director', 'exd']", $content);
        $content = str_replace("== 'admin' || \$user->role == 'director'", "== 'admin' || \$user->role == 'director' || \$user->role == 'exd'", $content);
        
        file_put_contents($path, $content);
        echo "Updated $path\n";
    }
}
