<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function (Request $request) {
    $locale = $request->getLocale(); // Obtiene el idioma default (Default 'en')
    return redirect('/'. $locale);
})->name('home');


//Login de usuario para dashboard
Route::post('/login', [Login::class, 'index']);
Route::post('/logout', [Logout::class, 'index'])->name('logout');

// Rutas para vistas multiidiomas
Route::group(['prefix' => '{locale}', 'middleware' => 'locale'], function () {
    // Web
    Route::get('/', function () {
        return view('web/home');
    })->name('home');

    //Admin Login
    Route::get('admin', function() {
        return view('admin/login');
    })->name('admin.login');

    // Rutas que requeren auth (Dashboard)
    Route::group(['middleware' => 'auth'], function () {
        // Aquí van las rutas que requieren autenticación
        Route::get('admin/dashboard', function() {
            return view('admin/dashboard/main');
        })->name('dashboard');

        Route::resource('admin/products', ProductController::class);
        // Rutas adicionales para mostrar diferentes vistas
        Route::get('admin/products', [ProductController::class, 'index'])->defaults('view', 'admin.product.list')->name('admin.product.list');
        Route::get('/products', [ProductController::class, 'index'])->defaults('view', 'web.list')->name('web.list');
    });

});

