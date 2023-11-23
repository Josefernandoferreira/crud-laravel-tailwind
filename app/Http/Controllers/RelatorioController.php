<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function alunosPorCurso()
    {
        $alunosPorCurso = Aluno::select('curso_id', DB::raw('COUNT(*) as total_alunos'))
            ->groupBy('curso_id')
            ->get();

        return view('relatorios.alunos_por_curso', compact('alunosPorCurso'));
    }

    public function alunosPorCursoOrdemAlfabetica()
    {
        $alunos = Aluno::with('curso')
            ->orderBy('nome')
            ->get();

        return view('relatorios.alunos_por_curso_ordem_alfabetica', compact('alunos'));
    }
}
