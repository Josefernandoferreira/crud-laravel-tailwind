<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

use Illuminate\Pagination\Paginator;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $query = Aluno::query();
        $cursos = Curso::all();
        $numberFilterPaginate = 5;

        if ($request->has('search_matricula')) {
            $query->where('matricula', 'like', '%' . $request->input('search_matricula') . '%');
        }

        if ($request->has('search_nome')) {
            $query->where('nome', 'like', '%' . $request->input('search_nome') . '%');
        }

        if ($request->has('search_curso_id')) {
            $query->where('curso_id', '=', $request->input('search_curso_id'));
        }

        if ($request->has('search_curso')) {
            $query->where('curso', 'like', '%' . $request->input('search_curso') . '%');
        }

        if ($request->has('search_bairro')) {
            $query->where('bairro', 'like', '%' . $request->input('search_bairro') . '%');
        }

        if ($request->has('search_qtd_filtro')) {
            $numberFilterPaginate = $request->input('search_qtd_filtro');
        }

        $alunos = $query->paginate($numberFilterPaginate);
        return view('aluno.index', compact('alunos', 'cursos'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('aluno.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Aluno::create($input);
        return redirect('aluno')->with('flash_message', 'Aluno Adicionado!');
    }

    public function show($id)
    {
        $aluno = Aluno::find($id);
        return view('aluno.show')->with('alunos', $aluno);
    }

    public function edit($id)
    {
        $cursos = Curso::all();
        $aluno = Aluno::find($id);
        return view('aluno.edit', compact('cursos'))->with('alunos', $aluno);
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        $input = $request->all();
        $aluno->update($input);
        return redirect('aluno')->with('flash_message', 'Aluno Atualizado!');
    }

    public function destroy($id)
    {
        Aluno::destroy($id);
        return redirect('aluno')->with('flash_message', 'Aluno Deletado!');
    }
}
