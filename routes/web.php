<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembroController;

Route::get('/', [MembroController::class, 'index']);

Route::get('/membros', [MembroController::class, 'show']);

Route::get('/membros/detalhe/{id}', [MembroController::class, 'showDetail']);

Route::post('/cadastramembros', [MembroController::class, 'store']);


