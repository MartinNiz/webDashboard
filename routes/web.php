<?php
use Illuminate\Http\Request;
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


Route::group(['prefix' => '{locale}', 'middleware' => 'locale'], function () {
    // Web
    Route::get('/', function () {
        return view('web/home');
    })->name('home');

    //Admin 
    Route::get('admin', function() {
        return view('admin/login');
    })->name('login');

    Route::get('dashboard', function() {
        return view('admin/dashboard/main');
    })->name('dashboard');


    Route::resource('admin/products', ProductController::class);
    // Rutas adicionales para mostrar diferentes vistas
    Route::get('admin/products', [ProductController::class, 'index'])->defaults('view', 'admin.product.list')->name('admin.product.list');
    Route::get('/products', [ProductController::class, 'index'])->defaults('view', 'web.list')->name('web.list');
});

