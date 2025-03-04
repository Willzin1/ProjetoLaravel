@extends('master')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center mt-3">Editar professor(a)</h2>
    <p class="text-center mt-1">Preencha o formulário abaixo para editar um professor(a).</p>

    <div class="col-lg-4 my-2">
        @if(session()->has('message'))
            <p class="alert alert-success text-center w-50 mx-auto mt-4">{{ session()->get('message') }}</p>
        @endif

        <form class="form-cadastro mt-1" action="{{ route('professores.update', ['professor' => $professor->id]) }}" method="post">

            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $professor->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="lastName" class="form-control" placeholder="Sobrenome" value="{{ $professor->lastName }}">
                @error('lastName')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ $professor->email }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" class="form-control" placeholder="Telefone (00) 00000-0000" value="{{ $professor->phone }}">
                @error('phone')
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
