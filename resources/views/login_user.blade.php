@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Entre</h2>
    <p class="text-center mt-1">Preencha os campos abaixo para entrar.</p>

    <div class="col-lg-4 my-2">
        <form class="form-cadastro" action="">
            <div class="mb-3">
                @csrf
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
            </div>
        </form>

        <p class="text-center mt-2">Não possui uma conta? Faça <a href="{{ route('users.create') }}">cadastro</a></p>
    </div>
</div>

@endsection
