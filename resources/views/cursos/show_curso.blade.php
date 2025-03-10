@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded">
        <div class="card-header bg-primary text-white text-center">
            <h3>Informações do curso(a) <strong class="text-decoration-underline">{{ $curso->name }}</strong></h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome:</strong> {{ $curso->name }}</li>
                <li class="list-group-item"><strong>Carga horária:</strong> {{ $curso->duracao }}</li>
            </ul>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}" class="btn btn-warning">
                ✏️ Editar curso
            </a>
            <form action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este curso?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Deletar curso</button>
            </form>

            <a href="{{ url()->previous() }}" class="btn btn-secondary ">⬅️ Voltar</a>
        </div>
    </div>
</div>
@endsection
