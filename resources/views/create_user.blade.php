@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Cadastre-se</h2>
    <p class="text-center mt-1">Preencha o formulário abaixo para criar uma conta.</p>

    <div class="col-lg-4 my-2">
    @if(session()->has('message'))
        <p class="text-center">{{ session()->get('message') }}</p>
    @endif
        <form class="form-cadastro mt-1" action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-3">

                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <input type="text" name="lastName" class="form-control" placeholder="Last name">
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Criar</button>
            </div>
        </form>

        <p class="text-center mt-2">Já possui uma conta? Faça <a href="{{ route('users.login') }}">Login</a></p>
    </div>
</div>

@endsection
