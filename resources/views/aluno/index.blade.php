@extends('layouts.layout')
@section('content')

<div class="container mx-auto">
    <div class="p-4 bg-red-500 rounded-lg text-white mt-4">
        <h2 class="text-2xl font-semibold">Listagem de Aluno</h2>
    </div>
    <div class="bg-white shadow-md my-6 rounded-lg">
        <div class="p-6 border-gray-200 mt-4">
            <a href="{{ url('/aluno/create') }}" class="bg-red-500 text-white px-4 py-4 rounded-lg hover:bg-red-400 focus:outline-none focus:bg-red-600" title="Adicionar Aluno">
                <i class="fas fa-plus"></i> Adicionar Aluno
            </a>

            <div class="mt-8">
                <span class="font-semibold">Filtros:</span>
            </div>

            <form method="GET" action="{{ route('aluno.index') }}" class="mt-2">
                <div class="flex gap-2">
                    <select name="search_qtd_filtro" class="w-[10rem] text-left py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="" disabled selected>01 a 50</option>
                        <option value="5">05</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    <input type="number" name="search_matricula" placeholder="Pesquisar por matrícula" class="w-full py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                    <input type="text" name="search_nome" placeholder="Pesquisar por nome" class="w-full py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                    <select name="search_curso_id" placeholder="Pesquisar por curso" class="w-full py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="" disabled selected>Selecione um curso</option>
                        @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome_curso }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="search_bairro" placeholder="Pesquisar por bairro" class="w-full py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="flex gap-2 items-center bg-red-500 text-white px-12 py-2 rounded-r-md hover:bg-red-600 focus:outline-none focus:ring focus:bg-red-800">
                        <i class="fa fa-search" aria-hidden="true"></i>Pesquisar
                    </button>
                </div>
            </form>

            <div class="mt-8 rounded-lg">
                <table class="table-auto w-full rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Matrícula</th>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Curso</th>
                            <th class="px-4 py-2">Bairro</th>
                            <th class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->matricula }}</td>
                            <td class="border px-4 py-2">{{ $item->nome }}</td>
                            <td class="border px-4 py-2">{{ $item->curso->nome_curso }}</td>
                            <td class="border px-4 py-2">{{ $item->bairro }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ url('/aluno/' . $item->id) }}" class="text-red-500 hover:underline" title="Visualizar Aluno">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Visualizar
                                </a>
                                <a href="{{ url('/aluno/' . $item->id . '/edit') }}" class="text-red-500 hover:underline ml-2" title="Editar Aluno">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                                </a>
                                <form method="POST" action="{{ url('/aluno' . '/' . $item->id) }}" accept-charset="UTF-8" class="inline" id="delete-form">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="button" class="text-red-500 hover:underline ml-2" title="Deletar Aluno" onclick="openModal()">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <div class="pagination">
                    <ul class="pagination__list">
                        {{ $alunos->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="confirmation-modal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-black opacity-50 absolute inset-0"></div>
    <div class="modal-content bg-white p-4 rounded shadow-lg" style="z-index:50">
        <p class="mb-4">Tem certeza de que deseja excluir este aluno?</p>
        <div class="flex justify-end">
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2" onclick="deleteItem()">Confirmar</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('confirmation-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        document.getElementById('confirmation-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function deleteItem() {
        document.getElementById('delete-form').submit();
    }
</script>

@endsection