<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;

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
        Route::any('categoria', [CategoriaController::class, 'index'])->name('categoria.index');
        Route::any('categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
        Route::any('categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
        Route::any('categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
        Route::any('categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
        Route::any('categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
        //Rotas para CRUD produto
        Route::any('produto', [ProdutoController::class, 'index'])->name('produto.index');
        Route::any('produto/create', [ProdutoController::class, 'create'])->name('produto.create');
        Route::any('produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
        Route::any('produto/store', [ProdutoController::class, 'store'])->name('produto.store');
        Route::any('produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
        Route::any('produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');


        //Rotas para perfil do usuário
        Route::controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('profile', 'edit')->name('edit');
            Route::put('profile', 'update')->name('update');
            Route::put('profile/password', 'password')->name('password');
        });
    });
});

//Rotas para pagina de que mostra os produtos
Route::get('/produtos', [SiteController::class, 'index'])->name('produtos.index');
Route::get('/produtos/filtro', [SiteController::class, 'filtro'])->name('produtos.filtro');
Route::get('/produtos/categorias', [SiteController::class, 'categorias'])->name('produtos.categorias');
