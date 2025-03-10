@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Cadastrar curso</h2>
    <p class="text-center mt-1">Preencha o formulário abaixo para cadastrar um curso.</p>

    <div class="col-lg-4 my-2">
    @if(session()->has('message'))
        <p class="alert alert-success text-center w-50 mx-auto mt-4">{{ session()->get('message') }}</p>
    @endif

        <form class="form-cadastro mt-1" action="{{ route('cursos.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nome do curso">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="duracao" class="form-control" placeholder="Carga horária">
                @error('duracao')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Cadastrar curso</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary ">⬅️ Voltar</a>
            </div>
        </form>
    </div>
</div>

@endsection
