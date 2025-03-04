<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public readonly Professor $professor;
    public function __construct()
    {
        $this->professor = new Professor;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professores = $this->professor->all();
        return view('professores.list_professores', ['professores' => $professores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('professores.create_professor', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:professores,email|max:255',
            'phone' => 'required|string',
            'curso_id' => 'required'
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'lastName.required' => 'O campo sobrenome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, informe um e-mail válido.',
            'email.unique' => 'E-mail já utilizado.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'curso_id' => 'Por favor, selecione um curso.'
        ]);

        $created = $this->professor->create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'curso_id' => $request->input('curso_id'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($created) {
            return redirect()->back()->with('message', 'Professor cadastrado com sucesso.');
        }

        return redirect()->back()->with('message', 'Algo deu errado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $professor = $this->professor->find($id);
        return view('professores.show_professor', ['professor' => $professor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professor = $this->professor->find($id);
        return view('professores.edit_professor', ['professor' => $professor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ], [
            'name.required' => 'Campo nome é obrigatório.',
            'lastName.required' => 'Campo sobrenome é obrigatório.',
            'email.required' => 'Campo e-mail é obrigatório.',
            'email.email' => 'Por favor, informe um e-mail válido.',
            'phone.required' => 'Campo telefone é obrigatório.'
        ]);

        $updated = $this->professor->where('id', $id)->update($request->except('_token', '_method'));

        if($updated) {
            return redirect()->route('professores.index')->with('message', 'Professor editado com sucesso.');
        }

        return redirect()->back()->with('message', 'Algo deu errado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->professor->where('id', $id)->delete();
        return redirect()->route('professores.index')->with('message', 'Professor deletado com sucesso.');
    }
}
