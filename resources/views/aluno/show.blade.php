@extends('layouts.layout')
@section('content')

<div class="p-4">
    <div class="p-4 bg-red-500 rounded-lg text-white">
        <h2 class="text-2xl font-semibold">Aluno</h2>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4 mt-4">
        <div class=" border-gray-300 pt-2">
            <p class="text-lg mb-2"><span class="font-semibold">Nome:</span> {{ $alunos->nome }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">Matricula:</span> {{ $alunos->matricula }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">Curso:</span> {{ $alunos->curso->nome_curso }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">CEP:</span> {{ $alunos->cep }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">Logradouro:</span> {{ $alunos->logradouro }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">Bairro:</span> {{ $alunos->bairro }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">Localidade:</span> {{ $alunos->localidade }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">UF:</span> {{ $alunos->uf }}</p>
        </div>
    </div>
</div>

@stop