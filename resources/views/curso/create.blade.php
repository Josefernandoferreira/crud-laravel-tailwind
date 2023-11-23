@extends('layouts.layout')
@section('content')

<div class="container mx-auto mt-6">
    <div class="p-4 bg-red-500 rounded-lg text-white">
        <h2 class="text-2xl font-semibold">Criação de Cursos</h2>
    </div>
    <div class="bg-white rounded-lg shadow-md mt-4">
        <div class="p-4">
            <form action="{{ url('curso') }}" method="post" class="space-y-4">
                {!! csrf_field() !!}

                <div class="space-y-2">
                    <label for="codigo_curso" class="block font-semibold">Código do Curso:</label>
                    <input type="number" name="codigo_curso" id="codigo_curso" class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required readonly />
                </div>

                <div class="space-y-2">
                    <label for="nome_curso" class="block font-semibold">Nome do Curso:</label>
                    <input type="text" name="nome_curso" id="nome_curso" class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required />
                </div>

                <div class="mt-4">
                    <input type="submit" value="Salvar" class="bg-red-500 cursor-pointer text-white px-4 py-2 rounded-md hover:bg-red-300 focus:outline-none focus:bg-red-600" required />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function generateRandomNumber(length) {
            const min = Math.pow(10, length - 1);
            const max = Math.pow(10, length) - 1;
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        const matriculaInput = document.getElementById('codigo_curso');
        const randomCode = generateRandomNumber(8);
        matriculaInput.value = randomCode;
    });
</script>

@stop