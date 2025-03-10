@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Editar curso</h2>
    <p class="text-center mt-1">Preencha o formulário abaixo para editar um curso.</p>

    <div class="col-lg-4 my-2">
    @if(session()->has('message'))
        <p class="alert alert-success text-center w-50 mx-auto mt-4">{{ session()->get('message') }}</p>
    @endif

        <form class="form-cadastro mt-1" action="{{ route('cursos.update', ['curso' => $curso->id]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nome do curso" value="{{ $curso->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="duracao" class="form-control" placeholder="Carga horária" value="{{ $curso->duracao }}">
                @error('duracao')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Cadastrar curso</button>
            </div>
        </form>
    </div>
</div>
@endsection
