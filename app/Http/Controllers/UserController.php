<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public readonly User $user;
    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:5|max:20|confirmed',
        ], [
            'name.required' => 'Campo nome é obrigatório',
            'lastName.required' => 'Campo last name é obrigatório',
            'email.required' => 'Campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido.',
            'email.unique' => 'E-mail já cadastrado.',
            'password.required' => 'Senha é obrigatória.',
            'password.min' => 'Senha deve conter no mínimo :min caracteres',
            'password.max' => 'Senha deve conter no máximo :max caracteres',
            'password.confirmed' => 'As senhas não coincidem.'
        ]);

        $created = $this->user->create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($created) {
            return redirect()->back()->with('message', 'Sucessfully created.');
        }

        return redirect()->back()->with('message', 'Something went wrong.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
