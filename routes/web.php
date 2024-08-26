<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PedidoController;
use \App\Http\Controllers\CadastroProdutoController;
use \App\Http\Controllers\ClientController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(('admin'))->group(function(){
Route::get('/dashboard',[PedidoController::class, 'dashboard']);
Route::delete('dashboard/{id}', [PedidoController::class, 'destroy']);
Route::get('/cadastro', [CadastroProdutoController::class, 'cadastroProduto']);
Route::post('cadastro',[CadastroProdutoController::class, 'store'])->name('cadastrar'); 
Route::delete('cadastro/{id}', [CadastroProdutoController::class, 'destroy'])->name('excluir');
Route::put('cadastro/{id}', [PedidoController::class, 'statusUpdate'])->name('update');
});


Route::middleware(('client'))->group(function(){
Route::get('/index',[ClientController::class, "index"])->name('index');
Route::get('/carrinho', [ClientController::class, 'exibirCarrinho'])->name('carrinho.exibir');
Route::post('/carrinho/adicionar/{id}', [ClientController::class, 'adicionarAoCarrinho'])->name('carrinho.adicionar');
Route::post('/pedido/finalizar', [ClientController::class, 'finalizarPedido'])->name('pedido.finalizar');
Route::get('/carrinho/remover/{id}', [ClientController::class, 'removerItem'])->name('carrinho.remover');
   
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
