<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public readonly Aluno $aluno;
    public function __construct()
    {
        $this->aluno = new Aluno;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = $this->aluno->all();

        return view('alunos.index_alunos', ['alunos' => $alunos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create_aluno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:alunos,email|max:255',
            'phone' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'weight' => 'required|string',
            'height' => 'required|string'
        ], [
            'name.required' => 'Nome é obrigatório.',
            'lastName' => 'Sobrenome é obrigatório.',
            'email.required' => 'E-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'E-mail já cadastrado.',
            'phone.required' => 'Telefone é obrigatório.',
            'birthDate.required' => 'Data de nascimento é obrigatório.',
            'weight.required' => 'Peso é obrigatório.',
            'height.required' => 'Altura é obrigatória.'
        ]);

        $created = $this->aluno->create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'birthDate' => $request->input('birthDate'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($created) {
            return redirect()->route('alunos.index')->with('message', 'Aluno cadastrado com sucesso.');
        }

        return redirect()->back()->with('message', 'Something went wrong.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = $this->aluno->find($id);
        return view('alunos.show_aluno', ['aluno' => $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = $this->aluno->find($id);
        return view('alunos.edit_aluno', ['aluno' => $aluno]);
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
            'phone' => 'required',
            'birthDate' => 'required',
            'weight' => 'required',
            'height' => 'required'
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'lastName.required' => 'O campo sobrenome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Insira um e-mail válido.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'weight.required' => 'O campo peso é obrigatório.',
            'height.required' => 'O campo altura é obrigatório.'
        ]);

        $updated = $this->aluno->where('id', $id)->update($request->except('_token', '_method'));

        if($updated) {
            return redirect()->route('alunos.index')->with('message', 'Aluno alterado com sucesso.');
        }

        return redirect()->back()->with('message', 'Something went wrong.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->aluno->where('id', $id)->delete();
        return redirect()->route('alunos.index')->with('message', 'Aluno deletado com sucesso.');
    }
}
