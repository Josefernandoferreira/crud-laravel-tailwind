@extends('layouts.layout')
@section('content')

<div class="container mx-auto mt-6">
    <div class="p-4 bg-red-500 text-white rounded-lg">
        <h2 class="text-2xl font-semibold">Edição de Curso</h2>
    </div>
    <div class="bg-white rounded-lg shadow-md mt-4">
        <div class="p-4">
            <form action="{{ url('curso/' .$cursos->id) }}" method="post" class="space-y-4">
                {!! csrf_field() !!}
                @method("PATCH")

                <input type="hidden" name="id" id="id" value="{{$cursos->id}}" id="id" />

                <div class="space-y-2">
                    <label for="codigo_curso" class="block font-semibold">Código do Curso:</label>
                    <input type="number" name="codigo_curso" id="codigo_curso" value="{{$cursos->codigo_curso}}" class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:red-blue-500" required readonly />
                </div>

                <div class="space-y-2">
                    <label for="nome_curso" class="block font-semibold">Nome do Curso:</label>
                    <input type="text" name="nome_curso" id="nome_curso" value="{{$cursos->nome_curso}}" class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:red-blue-500" required />
                </div>

                <div class="mt-4">
                    <input type="submit" value="Editar" class="bg-red-500 cursor-pointer text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600" required />
                </div>
            </form>
        </div>
    </div>
</div>

@stop