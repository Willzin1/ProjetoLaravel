@extends('master')

@section('content')
    <h2 class="text-center mt-5">Professores cadastrados</h2>

    @if(session()->has('message'))
        <p class="alert alert-success text-center w-50 mx-auto mt-4">{{ session()->get('message') }}</p>
    @endif

    @if($professores->isEmpty())
        <p class="text-center">Não há Professores cadastrados</p>
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
                    @foreach($professores as $professor)
                    <tr>
                        <td>{{ $professor->name }}</td>
                        <td>{{ $professor->lastName }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->phone }}</td>
                        <td><a href="{{ route('professores.show', ['professor' => $professor->id]) }}" class="btn btn-sm btn-warning">🔍 Mostrar detalhes</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
