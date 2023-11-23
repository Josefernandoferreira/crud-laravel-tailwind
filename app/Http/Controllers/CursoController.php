<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Pagination\Paginator;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::query();
        $numberFilterPaginate = 5;

        if ($request->has('search_codigo')) {
            $query->where('codigo_curso', 'like', '%' . $request->input('search_codigo') . '%');
        }

        if ($request->has('search_nome_curso')) {
            $query->where('nome_curso', 'like', '%' . $request->input('search_nome_curso') . '%');
        }

        if ($request->has('search_qtd_filtro')) {
            $numberFilterPaginate = $request->input('search_qtd_filtro');
        }

        $cursos = $query->paginate($numberFilterPaginate);
        return view('curso.index', compact('cursos'));
    }

    public function create()
    {
        return view('curso.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Curso::create($input);
        return redirect('curso')->with('flash_message', 'Curso Adicionado!');
    }

    public function show($id)
    {
        $curso = Curso::find($id);
        return view('curso.show')->with('cursos', $curso);
    }

    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('curso.edit')->with('cursos', $curso);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        $input = $request->all();
        $curso->update($input);
        return redirect('curso')->with('flash_message', 'Curso Atualizado!');
    }

    public function destroy($id)
    {
        Curso::destroy($id);
        return redirect('curso')->with('flash_message', 'Curso Deletado!');
    }
}
