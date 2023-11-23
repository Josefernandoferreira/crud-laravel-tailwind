@extends('layouts.layout')
@section('content')

<div class="container mx-auto mt-6">
    <div class="p-4 bg-red-500 text-white rounded-lg">
        <h2 class="text-2xl font-semibold">Edição de Aluno</h2>
    </div>
    <div class="bg-white rounded-lg shadow-md mt-4">
        <div class="p-4">
            <form action="{{ url('aluno/' .$alunos->id) }}" method="post" class="space-y-4">
                {!! csrf_field() !!}
                @method("PATCH")

                <input type="hidden" name="id" id="id" value="{{$alunos->id}}" id="id" />

                <div class="space-y-2">
                    <label for="matricula" class="block font-semibold">Matricula:</label>
                    <input type="number" name="matricula" id="matricula" value="{{$alunos->matricula}}" class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:red-blue-500" readonly required />
                </div>

                <div class="space-y-2">
                    <label for="nome" class="block font-semibold">Nome:</label>
                    <input type="text" name="nome" id="nome" value="{{$alunos->nome}}" class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:red-blue-500" required />
                </div>

                <div class="space-y-2">
                    <label for="curso" class="block font-semibold">Curso:</label>
                    <select class="block w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" name="curso_id" id="curso_id" required>
                        <option value="" disabled selected>Selecione um curso</option>
                        @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $alunos->curso_id == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nome_curso }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex space-x-2">
                    <div class="w-1/2 space-y-2">
                        <label for="cep" class="block font-semibold">CEP:</label>
                        <div class="flex space-x-2">
                            <input type="text" name="cep" id="cep" value="{{$alunos->cep}}" class=" w-[2rem] shadow-md flex-1 px-4 py-2 border rounded-l-md focus:outline-none focus:border-blue-500" required />
                            <button type="button" id="consultarCep" class="flex-none bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r-md focus:outline-none focus:shadow-outline">
                                <i class="fa fa-search" aria-hidden="true"></i> Consultar
                            </button>
                        </div>
                    </div>

                    <div class="w-1/2 space-y-2">
                        <label for="logradouro" class="block font-semibold">Logradouro:</label>
                        <input type="text" value="{{$alunos->logradouro}}" name="logradouro" id="logradouro" class="shadow-md w-full px-4 py-2 border rounded-md focus:outline-none focus:border-red-500" required />
                    </div>

                    <div class="w-1/2 space-y-2">
                        <label for="bairro" class="block font-semibold">Bairro:</label>
                        <input type="text" value="{{$alunos->bairro}}" name="bairro" id="bairro" class="shadow-md w-full px-4 py-2 border rounded-md focus:outline-none focus:border-red-500" required />
                    </div>

                    <div class="w-1/2 space-y-2">
                        <label for="localidade" class="block font-semibold">Localidade:</label>
                        <input type="text" value="{{$alunos->localidade}}" name="localidade" id="localidade" class="shadow-md w-full px-4 py-2 border rounded-md focus:outline-none focus:border-red-500" required />
                    </div>

                    <div class="space-y-2">
                        <label for="uf" class="block font-semibold">UF:</label>
                        <input type="text" value="{{$alunos->uf}}" name="uf" id="uf" class="shadow-md w-full px-4 py-2 border rounded-md focus:outline-none focus:border-red-500" required />
                    </div>
                </div>

                <div class="mt-4">
                    <input type="submit" value="Editar" class="bg-red-500 cursor-pointer text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600" required />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const consultarCepButton = document.getElementById('consultarCep');
        const cepInput = document.getElementById('cep');
        const logradouroInput = document.getElementById('logradouro');
        const bairroInput = document.getElementById('bairro');
        const localidadeInput = document.getElementById('localidade');
        const ufInput = document.getElementById('uf');

        $(cepInput).inputmask('99999-999');

        consultarCepButton.addEventListener('click', function() {
            const cep = cepInput.value.replace(/\D/g, '');

            if (cep.length !== 8) {
                alert('CEP deve conter 8 dígitos.');
                return;
            }
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                    } else {
                        logradouroInput.value = data.logradouro;
                        bairroInput.value = data.bairro;
                        localidadeInput.value = data.localidade;
                        ufInput.value = data.uf;
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar CEP:', error);
                });
        });
    });
</script>


@stop