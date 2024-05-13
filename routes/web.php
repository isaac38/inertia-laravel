<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerimissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    // Rutas de productos
    Route::get('/productos', [ProductController::class, 'index'])->name('productos_index');
    Route::post('/productos', [ProductController::class, 'store'])->name('productos_store');
    Route::put('/producto', [ProductController::class, 'update'])->name('producto_update');
    Route::delete('/producto/{id}', [ProductController::class, 'destroy'])->name('producto_destroy');

    //Rutas de configuraciones
    Route::get('/config', [ConfigController::class, 'index'])->name('config_index');

    //Rutas de usuarios dentro de configuraciones
    Route::get('/config/usuarios', [UserController::class, 'index'])->name('config_user_index');
    Route::post('/config/usuarios', [UserController::class, 'store'])->name('config_user_store');
    Route::put('/config/usuarios', [UserController::class, 'update'])->name('config_user_update');
    Route::delete('/config/usuarios/{id}', [UserController::class, 'destroy'])->name('config_user_delete');

    //Rutas de Roles dentro de configuraciones
    Route::get('/config/roles', [RoleController::class, 'index'])->name('config_role_index');
    Route::post('/config/roles', [RoleController::class, 'store'])->name('config_role_store');
    Route::put('/config/roles', [RoleController::class, 'update'])->name('config_role_update');
    Route::delete('/config/roles/{id}', [RoleController::class, 'destroy'])->name('config_role_destroy');

    //Rutas de Permisos dentro de configuraciones
    Route::get('/config/permisos', [PerimissionController::class, 'index'])->name('config_permisos_index');
    Route::post('/config/permisos', [PerimissionController::class, 'store'])->name('config_permisos_store');
});


require __DIR__.'/auth.php';
