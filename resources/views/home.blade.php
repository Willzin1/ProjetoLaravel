@extends('master')

@section('content')
    @if(!Auth::check())
        <h1 class="text-center mt-3">Projeto de Gerenciamento Escolar</h1>
        <p class="text-justify mt-3">
            Projeto de gerenciamento escolar, é um sistema desenvolvido em Laravel para o gerenciamento de alunos, professores e disciplinas.
            Com ele, é possível cadastrar alunos e professores, criar disciplinas e realizar a matrícula de alunos em matérias específicas.
        </p>
        <p class="text-justify">
            Faça <a href="{{ route('login.index') }}" class="text-muted">Login</a> ou
            <a href="{{ route('users.create') }}" class="text-muted">Cadastre-se</a> para acessar todas as funcionalidades do sistema.
        </p>
    @else
        <h2 class="text-center mt-3">Bem-vindo, <strong>{{ Auth::user()->name }}</strong></h2>
        <p class="text-justify mt-3">
            Sistema feito para simular o gerenciamento de uma escola ou unidade de ensino, com as seguintes funcionalidades:
        </p>
        <ul class="mt-3">
            <li>Cadastrar alunos e professores.</li>
            <li>Visualizar e editar informações dos cadastros.</li>
        </ul>
        <p class="text-justify mt-3">
            Projeto foi feito em laravel.
        </p>
    @endif
@endsection
