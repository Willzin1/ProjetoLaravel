@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Editar aluno</h2>
    <p class="text-center mt-1">Preencha o formulário abaixo para editar um aluno(a).</p>

    @if(session('mensagem'))
        <p class="alert alert-success text-center w-50 mx-auto mt-4">
            {{ session('mensagem') }}
        </p>
    @endif

    <div class="col-lg-4 my-2">

        <form class="form-cadastro mt-1" action="{{ route('alunos.update', ['aluno' => $aluno->id]) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $aluno->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="lastName" class="form-control" placeholder="Sobrenome" value="{{ $aluno->lastName }}">
                @error('lastName')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ $aluno->email }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" class="form-control" placeholder="Telefone (00) 00000-0000" value="{{ $aluno->phone }}">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="date" name="birthDate" class="form-control" value="{{ $aluno->birthDate }}">
                @error('birthDate')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="weight" class="form-control" placeholder="Peso (ex: 55.5)" value="{{ $aluno->weight }}">
                @error('weight')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="height" class="form-control" placeholder="Altura (ex: 1.80)" value="{{ $aluno->height }}">
                @error('height')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Editar aluno</button>
            </div>
        </form>
    </div>
</div>

@endsection
