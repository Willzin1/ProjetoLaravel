<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">ETEC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('alunos.create') }}">Cadastrar Aluno</a></li>
                        <li><a class="dropdown-item" href="{{ route('professores.create') }}">Cadastrar Professor</a></li>
                        <li><a class="dropdown-item" href="{{ route('cursos.create') }}">Cadastrar Matéria</a></li>
                        <li><div class="dropdown-divider"></div></li>
                        <li><a class="dropdown-item" href="{{ route('alunos.index') }}">Gerenciar Alunos</a></li>
                        <li><a class="dropdown-item" href="{{ route('professores.index') }}">Gerenciar Professores</a></li>
                        <li><a class="dropdown-item" href="{{ route('cursos.index') }}">Gerenciar Cursos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Dashboard</a></li>
                        <li><a class="dropdown-item" href="#">Editar info</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('login.destroy') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger ms-3">Sair</button>
                    </form>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}"><button class="btn btn-success">Entrar</button></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
