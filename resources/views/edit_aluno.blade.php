@extends('master')

@section('content')
    <h2>Edit</h2>

    <form action="{{ route('alunos.update', ['aluno' => $aluno->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" value="{{ $aluno->name }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="lastName" class="form-control" value="{{ $aluno->lastName }}">
            @error('lastName')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" value="{{ $aluno->email }}">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="tel" name="phone" class="form-control" value="{{ $aluno->phone }}">
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
            <input type="text" name="weight" class="form-control" value="{{ $aluno->weight }}">
            @error('weight')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="height" class="form-control" value="{{ $aluno->height }}">
            @error('height')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Editar aluno</button>
        </div>
    </form>
@endsection
