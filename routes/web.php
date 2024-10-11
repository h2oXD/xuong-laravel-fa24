<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\FinancialReport;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Sale;
use App\Models\Student;
use App\Models\Taxe;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//Relation 1-1
Route::get('/user', function () {
    $users = User::with('phone')->paginate(10);
    return view('Admins.user-list', compact('users'));
});
Route::get('/phones/{id}', function ($id) {
    $data = Phone::with('user')->find($id);
    dd($data->user);
});

//Relation 1-N
Route::get('/posts/{id}', function ($id) {
    $posts = Post::with('comments')->find($id);
    dd($posts->comments);
});

//Relation N-N
Route::get('/users/{id}/add-role', function ($id) {
    $roles = [1, 2, 4, 5];
    $users = User::find($id);
    // $users->roles()->attach($roles); //Thêm
    // $users->roles()->detach($roles); //Xoá
    // $users->roles()->sync($roles); //Thêm & Xoá
    // dd();
});

Route::get('admin', function () {
    return view('Admins.dashboard');
})->name('admin.dashboard');

$objects = [
    'students' => StudentController::class,
];
foreach ($objects as $key => $value) {
    Route::prefix('admin')->group(function () use ($key, $value) {
        Route::resource($key, $value);
    });
}

//CRUD - employees
Route::resource('admin/employees', EmployeeController::class);
Route::delete('admin/employees/{employee}/forceDestroy', [EmployeeController::class, 'forceDestroy'])->name('employees.forceDestroy');

//CRUD - customers
Route::resource('admin/customers', CustomerController::class);
Route::delete('admin/customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])->name('customers.forceDestroy');

//Auth - LaravelUI
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Bài tập Middleware
// Route::get('movies',function(){
//     echo 'Đây là trang movies';
// })->middleware('yearold');

// Route::middleware('role')->group(function(){
//     Route::get('admin', function () {
//         return view('Admins.dashboard');
//     })->name('admin.dashboard');

//     Route::get('orders', function () {
//         echo 'Trang Cho Nhân Viên';
//     });
//     Route::get('profile', function () {
//         echo 'Trang cho Khách hàng';
//     });
// });






// Route::get('baitap', function () {
//Viết Bằng QueryBuilder
// $sql1 = DB::table('sales')
//     ->selectRaw(
//         "SUM(total) as total_sales,
//         MONTH(sale_date) as month,
//         YEAR(sale_date) as year"
//     )
//     ->groupByRaw('YEAR(sale_date), MONTH(sale_date)')
//     ->toRawSql();

// $sql2 = DB::table('expenses')
//     ->selectRaw(
//         "SUM(amount) as total_expenses,
//         MONTH(expense_date) as month,
//         YEAR(expense_date) as year"
//     )
//     ->groupByRaw('YEAR(expense_date), MONTH(expense_date)')
//     ->toRawSql();
//Viết Bằng Eloquent
//     $sql1 = Sale::selectRaw(
//         "SUM(total) as total_sales,
//             MONTH(sale_date) as month,
//             YEAR(sale_date) as year"
//     )
//         ->groupByRaw('YEAR(sale_date), MONTH(sale_date)')
//         ->get();
//     $sql2 = Expense::selectRaw(
//         "SUM(amount) as total_expenses,
//             MONTH(expense_date) as month,
//             YEAR(expense_date) as year"
//     )
//         ->groupByRaw('YEAR(expense_date), MONTH(expense_date)')
//         ->get();


//     //Câu Create

//     $total_sales = (float) Sale::query()->whereMonth('sale_date', 9)->whereYear('sale_date', 2024)->sum('total');
//     $total_expenses = (float) Expense::query()->whereMonth('expense_date', 9)->whereYear('expense_date', 2024)->sum('amount');
//     $profit_before_tax = round($total_sales - $total_expenses, 2);
//     $tax_amount = round($total_sales * (float) ((Taxe::where('taxe_name', 'VAT')->value('rate')/100)), 2);
//     $profit_after_tax = round($profit_before_tax - $tax_amount, 2);
//     FinancialReport::create(
//         [
//             'month'             => '9',
//             'year'              => '2024',
//             'total_sales'       => $total_sales,
//             'total_expenses'    => $total_expenses,
//             'profit_before_tax' => $profit_before_tax,
//             'tax_amount'        => $tax_amount,
//             'profit_after_tax'  => $profit_after_tax
//         ]
//     );

//     dd($sql1->toArray(), $sql2->toArray());
// });

// Route::get('/baitap', function () {
//     $sql1 = DB::table('users as u')
//         ->join('orders as o', 'u.id', '=', 'o.user_id')
//         ->groupBy('u.name')
//         ->having('total_spent', '>', 1000)
//         ->selectRaw('u.name, SUM(o.amount) as total_spent')
//         ->toRawSql();

//     $sql2 = DB::table('oders')
//         ->whereBetween('order_date', ['2024-01-01', '2024-09-30'])
//         ->groupByRaw('DATE(order_date)')
//         ->selectRaw('DATE(order_date) as date, COUNT(*) as orders_count,SUM(total_amount) as total_sales')
//         ->toRawSql();

//     $sql3 = DB::table('products as p')
//         ->select('product_name')
//         ->whereNotExists(function (Builder $query) {
//             $query->select(1)->from('orders as o')->where('o.product_id', 'p.id');
//         })
//         ->toRawSql();
//     $sql4 = DB::table('products as p')
//         ->join(DB::raw("((SELECT product_id,SUM(quantity) as total_sold FROM sales GROUP BY product_id) as sales_cte) as s"), 'p.id', 's.product_id')
//         ->where('s.total_sold', '>', 100)
//         ->select('p.product_name', 's.total_sold')
//         ->toRawSql();

//     $sql5 = DB::table('users')
//         ->join('orders', 'user.id', '=', 'order.user_id')
//         ->join('order_items', 'order.id', '=', 'order_items.order_id')
//         ->join('products', 'order_items.product_id', '=', 'products.id')
//         ->whereRaw("order.order_date >= NOW() - INTERVAL 30 DAY")
//         ->select('users.name', 'products.product_name', 'order.order_date')
//         ->toRawSql();

//     $sql6 = DB::table('orders')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->where('orders.status', 'completed')
//         ->groupBy('order_month')
//         ->orderByDesc('order_month')
//         ->selectRaw("DATE_FORMAT(orders.order_date, '%Y-%m') as order_month, SUM(order_items.quantity * order_items.price) as total_revenue")
//         ->toRawSql();

//     $sql7 = DB::table('products')
//         ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
//         ->whereNull('order_items.product_id')
//         ->select('products.product_name')
//         ->toRawSql();

//     $sql8 = DB::table('products as p')
//         ->join(DB::raw("(SELECT product_id,SUM(quantity * price) as total FROM order_items GROUP BY product_id) as oi"), 'p.id', '=', 'oi.product_id')
//         ->groupBy('p.category_id', 'p.produc_name')
//         ->orderByDesc('max_revenue')
//         ->toRawSql();

//     $sql9 = DB::table('orders')
//         ->join('users', 'users.id', '=', 'orders.user_id')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->groupBy('orders.id', 'users.name', 'orders.order_date')
//         ->havingRaw("total_value > (SELECT AVG(total) FROM (SELECT SUM(quantity * price ) as total FROM order_items GROUP BY order_id) AS avg_order_value)")
//         ->selectRaw("orders.id, users.name, orders.order_date, SUM(order_items.quantity * order_items.price) AS total_value")
//         ->toRawSql();

//     $sql10 = DB::table('products as p')
//         ->join('order_items as oi', 'p.id', '=', 'oi.product_id')
//         ->groupBy('p.category_id', 'p.product_name')
//         ->havingRaw("total_sold = (
//                                     SELECT MAX(sub.total_sold)
//                                     FROM(
//                                     SELECT product_name, SUM(quantity) as total_sold
//                                     FROM order_items
//                                     JOIN product ON order_items.product_id = products.id
//                                     WHERE products.category_id = p.category_id
//                                     GROUP BY product_name
//                                     ) sub
//                                     )")
//         ->toRawSql();


//     dd($sql1, $sql2, $sql3, $sql4, $sql5, $sql6, $sql7, $sql8, $sql9, $sql10);




// });


