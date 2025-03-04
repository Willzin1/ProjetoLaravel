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
}
