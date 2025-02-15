<?php

use App\Http\Controllers\ContatosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContatosController::class, 'index'])->name('contatos.index');
