@extends('master')

@section('content')
    <div class="row justify-content-center">
        <h2 class="text-center mt-3">Cadastar aluno</h2>
        <p class="text-center mt-1">Preencha o formulário abaixo para cadastrar um aluno(a).</p>

        @if(session('mensagem'))
            <p class="alert alert-success text-center mx-auto mt-4">
                {{ session('mensagem') }}
            </p>
        @endif

        <div class="col-lg-4 my-2">
            <form class="form-cadastro mt-1" action="{{ route('alunos.store') }}" method="post">
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
                <div class="mb-3">
                    <input type="text" name="weight" class="form-control" placeholder="Peso (ex: 55.5)">
                    @error('weight')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="height" class="form-control" placeholder="Altura (ex: 1.80)">
                    @error('height')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Cadastrar aluno</button>
                </div>
            </form>
        </div>
    </div>
@endsection
