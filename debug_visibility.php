<?php
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "--- USERS ---\n";
// Get all users, ID, Name, Role, Dept ID
$users = DB::table('users')->select('id', 'full_name', 'role', 'department_id')->get();
foreach ($users as $u) {
    echo "ID: {$u->id}, Name: {$u->full_name}, Role: {$u->role}, Dept: {$u->department_id}\n";
}

echo "\n--- ORDERS (Last 10) ---\n";
$orders = DB::table('orders')
    ->leftJoin('users', 'orders.user_id', '=', 'users.id')
    ->select('orders.id', 'orders.order_no', 'orders.approval_status', 'orders.user_id', 'users.full_name', 'users.department_id as requester_dept_id')
    ->orderBy('orders.created_at', 'desc')
    ->limit(10)
    ->get();

foreach ($orders as $o) {
    echo "ID: {$o->id}, No: {$o->order_no}, Status: {$o->approval_status}, User: {$o->full_name} ({$o->user_id}), Req Dept: {$o->requester_dept_id}\n";
}
