<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::middleware('locale')->group(function () {

    Route::put('/locale', [LocaleController::class, 'setLocale'])->name('locale');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Auth::routes();

    Route::middleware('auth')->group(function () {

        //Rota para dashboard
        Route::any('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Rotas para log
        Route::any('log', [LogController::class, 'index'])->name('log.index');

        //Rotas para CRUD usuário
        Route::resource('user', UserController::class, ['except' => ['show']]);
        //Rotas para CRUD categoria
        Route::any('categoria', [\App\Http\Controllers\CategoriaController::class, 'index'])->name('categoria.index');
        Route::any('categoria/create', [\App\Http\Controllers\CategoriaController::class, 'create'])->name('categoria.create');
        Route::any('categoria/edit/{id}', [\App\Http\Controllers\CategoriaController::class, 'edit'])->name('categoria.edit');
        Route::any('categoria/store', [\App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria.store');
        Route::any('categoria/update/{id}', [\App\Http\Controllers\CategoriaController::class, 'update'])->name('categoria.update');
        Route::any('categoria/{id}', [\App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categoria.destroy');
        //Rotas para CRUD produto
        Route::get('produto', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('produto.index');
        Route::any('produto/create', [\App\Http\Controllers\ProdutoController::class, 'create'])->name('produto.create');
        Route::any('produto/edit/{id}', [\App\Http\Controllers\ProdutoController::class, 'edit'])->name('produto.edit');
        Route::any('produto/store', [\App\Http\Controllers\ProdutoController::class, 'store'])->name('produto.store');
        Route::any('produto/update/{id}', [\App\Http\Controllers\ProdutoController::class, 'update'])->name('produto.update');
        Route::any('produto/{id}', [\App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produto.destroy');


        //Rotas para perfil do usuário
        Route::controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('profile', 'edit')->name('edit');
            Route::put('profile', 'update')->name('update');
            Route::put('profile/password', 'password')->name('password');
        });
    });
});
