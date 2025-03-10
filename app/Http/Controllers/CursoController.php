<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public readonly Curso $curso;
    public function __construct()
    {
        $this->curso = new Curso;
    }

    public function create() {
        return view('cursos.store_curso');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'duracao' => 'required',
        ], [
            'name.required' => 'Campo nome é obrigatório.',
            'duracao.required' => 'Campo carga horária é obrigatório.'
        ]);

        $created = $this->curso->create([
            'name' => $request->input('name'),
            'duracao' => $request->input('duracao'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($created) {
            return redirect()->back()->with('message', 'Curso cadastrado com sucesso.');
        }

        return redirect()->back()->with('message', 'Algo deu errado.');
    }

    public function index() {
        $cursos = $this->curso->all();

        return view('cursos.list_cursos', ['cursos' => $cursos]);
    }

    public function edit(string $id) {
        $curso = $this->curso->find($id);
        return view('cursos.edit_curso', ['curso' => $curso]);
    }

    public function show(string $id) {
        $curso = $this->curso->find($id);
        return view('cursos.show_curso', ['curso' => $curso]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required',
            'duracao' => 'required'
        ], [
            'name.required' => 'Campo nome do curso é obrigatório.',
            'duracao.required' => 'Campo carga horária é obrigatório.'
        ]);

        $updated = $this->curso->where('id', $id)->update($request->except('_token', '_method'));

        if($updated) {
            return redirect()->route('cursos.index')->with('message', 'Curso alterado com sucesso.');
        }

        return redirect()->back()->with('message', 'Algo deu errado');
    }

    public function destroy(string $id) {
        $this->curso->where('id', $id)->delete();
        return redirect()->route('cursos.index')->with('message', 'Curso deletado com sucesso.');
    }
}
