@extends('master')

@section('content')
    <h2 class="text-center mt-5">Alunos cadastrados</h2>

    @if(session()->has('message'))
        <p class="alert alert-success text-center w-50 mx-auto mt-4">{{ session()->get('message') }}</p>
    @endif

    @if($alunos->isEmpty())
        <p class="text-center">Não há alunos cadastrados</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-sm mt-2">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->name }}</td>
                        <td>{{ $aluno->lastName }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->phone }}</td>
                        <td class=""><a href="{{ route('alunos.edit', ['aluno' => $aluno->id]) }}" class="btn btn-sm btn-warning">✏️ Editar aluno</a></td>
                        <td class=""><a href="{{ route('alunos.show', ['aluno' => $aluno->id]) }}" class="btn btn-sm btn-primary">🔍 Mostrar detalhes</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
