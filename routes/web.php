<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\ImagenController;

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
Route::post('/login', [LoginController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

Route::group(['prefix' => '{locale}', 'middleware' => 'locale'], function () {
    // Rutas de la aplicación web
    Route::get('/', function () {
        return view('web/home');
    })->name('home');

    // Web Products
    Route::get('/products', [ProductController::class, 'indexWeb'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.detail');

    // Rutas de autenticación de administrador
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('/dashboard', function() {
            return view('admin/dashboard/main');
        })->name('admin.dashboard');

        Route::post('/images', [ImagenController::class, 'store'])->name('admin.images');

        // Rutas de productos de administración
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::patch('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    // Ruta de inicio de sesión de administrador
    Route::get('/admin', function() {
        if (Auth::check()) {
            $locale = request()->segment(1);
            return redirect()->route('admin.dashboard',['locale' => $locale] );
        } else {
            return view('admin/login');
        }
    })->name('admin.login');
});