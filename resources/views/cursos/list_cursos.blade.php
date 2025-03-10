@extends('master')

@section('content')
    <h2 class="text-center mt-5">Cursos cadastrados</h2>

    @if(session()->has('message'))
        <p class="alert alert-success text-center w-50 mx-auto mt-4">{{ session()->get('message') }}</p>
    @endif

    @if($cursos->isEmpty())
        <p class="text-center">Não há cursos cadastrados</p>
    @else
    <div class="table-responsive">
            <table class="table table-striped table-sm mt-2">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Duração</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->name }}</td>
                        <td>{{ $curso->duracao }}</td>
                        <td class=""><a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}" class="btn btn-sm btn-warning">✏️ Editar curso</a></td>
                        <td class=""><a href="{{ route('cursos.show', ['curso' => $curso->id]) }}" class="btn btn-sm btn-primary">🔍 Mostrar detalhes</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
