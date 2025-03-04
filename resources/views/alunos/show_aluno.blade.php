@extends('master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded">
        <div class="card-header bg-primary text-white text-center">
            <h3>Informações do aluno(a) <strong class="text-decoration-underline">{{ $aluno->name }} {{ $aluno->lastName }}</strong></h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome:</strong> {{ $aluno->name }}</li>
                <li class="list-group-item"><strong>Sobrenome:</strong> {{ $aluno->lastName }}</li>
                <li class="list-group-item"><strong>E-mail:</strong> {{ $aluno->email }}</li>
                <li class="list-group-item"><strong>Telefone:</strong> {{ $aluno->phone }}</li>
                <li class="list-group-item"><strong>Peso:</strong> {{ $aluno->weight }} kg</li>
                <li class="list-group-item"><strong>Altura:</strong> {{ $aluno->height }} cm</li>
                <li class="list-group-item"><strong>Data de nascimento:</strong> {{ $aluno->birthDate }}</li>
            </ul>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('alunos.edit', ['aluno' => $aluno->id]) }}" class="btn btn-warning">
                ✏️ Editar aluno
            </a>
            <form action="{{ route('alunos.destroy', ['aluno' => $aluno->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este aluno?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Deletar aluno</button>
            </form>

            <a href="{{ url()->previous() }}" class="btn btn-secondary ">⬅️ Voltar</a>
        </div>
    </div>
</div>
@endsection
