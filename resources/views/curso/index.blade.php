@extends('layouts.layout')
@section('content')

<div class="container mx-auto">
    <div class="p-4 bg-red-500 rounded-lg text-white mt-4">
        <h2 class="text-2xl font-semibold">Listagem de Cursos</h2>
    </div>
    <div class="bg-white shadow-md my-6 rounded-lg">
        <div class="p-6 border-gray-200 mt-4">
            <a href="{{ url('/curso/create') }}" class="bg-red-500 text-white px-4 py-4 rounded-lg hover:bg-red-400 focus:outline-none focus:bg-red-600" title="Adicionar Curso">
                Adicionar Curso
            </a>

            <div class="mt-8">
                <span class="font-semibold">Filtros:</span>
            </div>

            <form method="GET" action="{{ route('curso.index') }}" class="mt-2">
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
                    <input type="number" name="search_codigo" placeholder="Pesquisar por código do curso" class="w-full py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                    <input type="text" name="search_nome_curso" placeholder="Pesquisar por nome do curso" class="w-full py-2 px-4 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="flex gap-2 items-center bg-red-500 text-white px-4 py-2 rounded-r-md hover:bg-red-600 focus:outline-none focus:ring focus:bg-red-800">
                        <i class="fa fa-search" aria-hidden="true"></i>Pesquisar
                    </button>
                </div>
            </form>

            <div class="mt-8 rounded-lg">
                <table class="table-auto w-full rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Código do Curso</th>
                            <th class="px-4 py-2">Nome do Curso</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->codigo_curso }}</td>
                            <td class="border px-4 py-2">{{ $item->nome_curso }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ url('/curso/' . $item->id) }}" class="text-red-500 hover:underline" title="Visualizar Curso">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Visualizar
                                </a>
                                <a href="{{ url('/curso/' . $item->id . '/edit') }}" class="text-red-500 hover:underline ml-2" title="Editar Curso">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <div class="pagination">
                    <ul class="pagination__list">
                        {{ $cursos->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection