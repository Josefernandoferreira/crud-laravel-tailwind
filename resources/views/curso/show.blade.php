@extends('layouts.layout')
@section('content')

<div class="p-4">
    <div class="p-4 bg-red-500 rounded-lg text-white">
        <h2 class="text-2xl font-semibold">Curso</h2>
    </div>
    <div class="bg-white rounded-lg shadow-md p-4 mt-4">
        <div class=" border-gray-300 pt-2">
            <p class="text-lg mb-2"><span class="font-semibold">Código do Curso:</span> {{ $cursos->codigo_curso }}</p>
            <p class="text-lg mb-2"><span class="font-semibold">Nome do Curso:</span> {{ $cursos->nome_curso }}</p>
        </div>
    </div>
</div>
@stop