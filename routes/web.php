
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShippingController;

Route::get('/', function (\Illuminate\Http\Request $request) {

    // Mengambil kata kunci pencarian
    $query = $request->input('search');

    // Mengambil produk berdasarkan pencarian
    $products = Product::when($query, function ($q) use ($query) {
        $q->where('nama', 'like', '%' . $query . '%');
    })->get();

    // Mengambil seluruh kategori dari database
    $categories = Category::latest()->get();

    // Mengirim data produk, kategori, dan pencarian ke home
    return view('home', compact(
        'products',
        'categories',
        'query'
    ));

})->name('landing');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('products', ProductController::class);


// ROUTE KERANJANG
Route::middleware('auth')->group(function () {

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/cart/{id}/increase', [CartController::class, 'increase'])
        ->name('cart.increase');

    Route::post('/cart/{id}/decrease', [CartController::class, 'decrease'])
        ->name('cart.decrease');

    Route::delete('/cart/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

});


Route::post('/checkout/prepare', [CheckoutController::class, 'prepare'])
    ->middleware('auth')
    ->name('checkout.prepare');

    Route::get('/checkout', [CheckoutController::class, 'index'])
    ->middleware('auth')
    ->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'process'])
    ->middleware('auth')
    ->name('checkout.process');

Route::get('/success/{order}', function (Order $order) {

    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    $order->load('items.product');

    return view('success', compact('order'));

})->middleware('auth')->name('success');

Route::get('/categories', function () {
    return view('categories');
})->name('categories');

Route::get('/shop', function () {
    $products = Product::all();

    return view('shop', compact('products'));
})->name('shop');

Route::get('/user', function (\Illuminate\Http\Request $request) {
    return redirect()->route('landing', $request->only('search'));
})->name('user.dashboard');

// RIWAYAT BELANJA PENGGUNA
Route::get('/riwayat', function () {

    $orders = Order::with('items.product')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('history', compact('orders'));

})->middleware('auth')->name('user.history');

// PROFIL PENGGUNA
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('user.profile');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('user.profile.update');
});

Route::post('/chatbot', [ChatbotController::class, 'chat'])
    ->name('chatbot.chat');

Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('products', AdminProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('orders', OrderController::class);

        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');
    });

Route::post('/midtrans/notification', [PaymentController::class, 'notification'])
    ->name('midtrans.notification');

Route::middleware('auth')->group(function () {
    Route::get('/shipping/destinations', [ShippingController::class, 'searchDestination'])
        ->name('shipping.destinations');

    Route::post('/shipping/calculate', [ShippingController::class, 'calculateCost'])
        ->name('shipping.calculate');
      
    Route::get('/shipping/provinces', [ShippingController::class, 'provinces'])
        ->name('shipping.provinces');

    Route::get('/shipping/cities/{provinceId}', [ShippingController::class, 'cities'])
        ->name('shipping.cities');

    Route::get('/shipping/districts/{cityId}', [ShippingController::class, 'districts'])
        ->name('shipping.districts');

    Route::get('/shipping/subdistricts/{districtId}', [ShippingController::class, 'subdistricts'])
        ->name('shipping.subdistricts');

});
