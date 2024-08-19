<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PedidoController;
use \App\Http\Controllers\CadastroProdutoController;
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

Route::middleware(('admin'))->group(function(){


    Route::get('/dashboard',[PedidoController::class, 'dashboard']);
    Route::get('/cadastro', [CadastroProdutoController::class, 'cadastroProduto']);
    Route::post('cadastro',[CadastroProdutoController::class, 'store'])->name('cadastrar');
    
});


Route::middleware(('client'))->group(function(){
    Route::get('client', function(){
        dd('voce é um client');
    });
    });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
