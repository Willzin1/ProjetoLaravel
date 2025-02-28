@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Cadastrar professor(a)</h2>
    <p class="text-center mt-1">Preencha o formulário abaixo para cadastrar um professor(a).</p>

    <div class="col-lg-4 my-2">
        <form class="form-cadastro mt-1" action="{{ route('professor.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nome">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="lastName" class="form-control" placeholder="Sobrenome">
                @error('lastName')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" class="form-control" placeholder="Telefone (00) 00000-0000">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="date" name="birthDate" class="form-control">
                @error('birthDate')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Cadastrar professor</button>
            </div>
        </form>
    </div>
</div>

@endsection
