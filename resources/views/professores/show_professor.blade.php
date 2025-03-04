@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded">
        <div class="card-header bg-primary text-white text-center">
            <h3>Informações do professor(a) <strong class="text-decoration-underline">{{ $professor->name }} {{ $professor->lastName }}</strong></h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome:</strong> {{ $professor->name }}</li>
                <li class="list-group-item"><strong>Sobrenome:</strong> {{ $professor->lastName }}</li>
                <li class="list-group-item"><strong>E-mail:</strong> {{ $professor->email }}</li>
                <li class="list-group-item"><strong>Telefone:</strong> {{ $professor->phone }}</li>
                <li class="list-group-item"><strong>Curso:</strong> {{ $professor->curso_id }}</li>
            </ul>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('professores.edit', ['professor' => $professor->id]) }}" class="btn btn-warning">
                ✏️ Editar professor
            </a>
            <form action="{{ route('professores.destroy', ['professor' => $professor->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este professor?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Deletar professor</button>
            </form>

            <a href="{{ url()->previous() }}" class="btn btn-secondary ">⬅️ Voltar</a>
        </div>
    </div>
</div>
@endsection
