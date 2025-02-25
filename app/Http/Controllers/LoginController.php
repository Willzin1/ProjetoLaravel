<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login_user');
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'Senha deve conter pelo menos :min caracteres',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if(!$user) {
            return redirect()->back()->withErrors(['error' => 'E-mail ou senha inválidos.']);
        }

        if(!password_verify($request->input('password'), $user->password)) {
            return redirect()->back()->withErrors(['error' => 'E-mail ou senha inválidos.']);
        }

        Auth::loginUsingId($user->id);

        return redirect()->route('home')->with('success', 'Logged in');
    }

    public function destroy() {
        Auth::logout();
        return view('home')->with('message', 'Usuario saiu...');
    }
}
