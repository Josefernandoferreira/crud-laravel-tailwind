@extends('layouts.layout')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Relatório de Alunos por Curso em Ordem Alfabética</h1>
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="flex py-2 px-4 bg-gray-200">Curso</th>
                <th class="py-2 px-4 bg-gray-200">Nome do Aluno</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td class="py-2 px-4">{{ $aluno->curso->nome_curso }}</td>
                <td class="text-center py-2 px-4">{{ $aluno->nome }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection