<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

Auth::routes();

Route::get('/consultar-cep', function () {
    return view('consultar-cep');
});

Route::post('/consultar-cep', function () {
    $cep = request('cep');
    $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
    $endereco = $response->json();

    return view('consultar-cep', compact('endereco'));
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/', AlunoController::class);
    Route::resource('/aluno', AlunoController::class);
    Route::resource('/home', AlunoController::class);
    Route::resource('/curso', CursoController::class);
    Route::get('/relatorio-alunos-por-curso', 'App\Http\Controllers\RelatorioController@alunosPorCurso');
    Route::get('/relatorio-alunos-por-curso-ordem-alfabetica', 'App\Http\Controllers\RelatorioController@alunosPorCursoOrdemAlfabetica');
});
