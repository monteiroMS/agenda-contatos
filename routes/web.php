<?php

use App\Http\Controllers\CepController;
use App\Http\Controllers\ContatosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('contatos.index');
})->name('index');

Route::prefix('contatos')->group(function () {
    Route::get('/', [ContatosController::class, 'index'])->name('contatos.index');
    Route::post('create', [ContatosController::class, 'store'])->name('contatos.create');
    Route::group(['prefix' => '{id}'], function () {
        Route::put('update', [ContatosController::class, 'update'])->name('contatos.update');
        Route::delete('delete', [ContatosController::class, 'destroy'])->name('contatos.delete');
    });
});

Route::prefix('api')->group(function () {
    Route::post('busca-cep', [CepController::class, 'busca'])->name('api.cep.busca');
});
