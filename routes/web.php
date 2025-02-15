<?php

use App\Http\Controllers\CepController;
use App\Http\Controllers\ContatosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContatosController::class, 'index'])->name('contatos.index');
Route::prefix('api')->group(function () {
    Route::post('busca-cep', [CepController::class, 'busca'])->name('api.cep.busca');
});
