@extends('master')

@section('content')
    <h3 class="text-center">Informações aluno(a) {{ $aluno->name }} </h3>
    <ul class="text-justify">
        <li><strong>Nome do aluno:</strong> {{ $aluno->name }}</li>
        <li><strong>Sobrenome do aluno:</strong> {{ $aluno->lastName }}</li>
        <li><strong>E-mail do aluno:</strong> {{ $aluno->email }}</li>
        <li><strong>Telefone do aluno:</strong> {{ $aluno->phone }}</li>
        <li><strong>Peso do aluno:</strong> {{ $aluno->weight }}kg</li>
        <li><strong>Altura do aluno:</strong> {{ $aluno->height }}cm</li>
        <li><strong>Data de nascimento do aluno:</strong> {{ $aluno->birthDate }}</li>
        <li><a href="{{ route('alunos.edit', ['aluno' => $aluno->id]) }}">Editar aluno</a></li>
    </ul>

    <form action="{{ route('alunos.destroy', ['aluno' => $aluno->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE" >
        <button type="submit">Delete</button>
    </form>
@endsection
