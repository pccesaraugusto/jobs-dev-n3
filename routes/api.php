<?php

use App\Http\Controllers\api\ReportsController;
use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//-- Listar Reports nao precisa usar o middleware
Route::get('/reports', [ReportsController::class, 'getAllReports'])->name('reports.list');

//-- Obter reports por id
Route::get('/reports/{id}', [ReportsController::class, 'getReports'])->name('reports');

//-- usando o middleware para permitir a criacao dos reports.
Route::post('/reports/create', [ReportsController::class, 'createReports', 'middleweare' => 'auth'])->name('reports.create');

//-- usando o middleware para permitir a alteracao dos reports.
Route::put('/reports/update/{id}', [ReportsController::class, 'updateReports', 'middleweare' => 'auth'])->name('reports.update');

//usando o middleware para permitir a exclusao
Route::delete('/reports/delete/{id}', [ReportsController::class, 'deleteReports', 'middleweare' => 'auth'])->name('reports.delete');

//-- criando rota de autenticacao
Route::prefix('auth')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
});