@extends('master')

@section('content')
<div class="row justify-content-center">
    @if(session()->has('message'))
        <p class="alert alert-danger text-center w-50 mx-auto mt-3">{{ session()->get('message') }}</p>
    @endif
    <h2 class="text-center mt-3">Entre</h2>
    <p class="text-center mt-1">Preencha os campos abaixo para entrar.</p>

    @error('error')
        <p class="text-center text-danger">{{ $message }}</p>
    @enderror

    <div class="col-lg-4 my-2">
        <form class="form-cadastro" action="{{ route('login.store') }}" method="post">
            <div class="mb-3">
                @csrf
                <input type="email" name="email" class="form-control" placeholder="E-mail">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Senha">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
            </div>
        </form>

        <p class="text-center mt-2">Não possui uma conta? Faça <a href="{{ route('users.create') }}">cadastro</a></p>
    </div>
</div>

@endsection
