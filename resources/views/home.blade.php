@extends('master')

@section('content')
        <h1 class="text-center">Teste</h1>
    @if(Auth::check())
        <p class="text-center mt-3">Bem vindo, {{ Auth::user()->name }}</p1>
    @endif
        <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat impedit laborum earum eius voluptate cumque consectetur quasi eligendi repudiandae quibusdam. Aliquam fugit in reprehenderit minus! In nostrum modi neque? Omnis.</p>
@endsection
