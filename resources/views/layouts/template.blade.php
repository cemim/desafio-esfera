<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="container-bar" onclick="alterarBar(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div class="menu" id="menu">
            <ul>
                <li><a href="{{ route('inicio') }}"><span>Home</span></a></li>
                <li>
                    <span>Tarefas</span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('tasks.index') }}"><span>Listar Tarefas</span></a></li>
                        <li><a href="{{ route('tasks.create') }}"><span>Nova Tarefa</span></a></li>
                    </ul>
                </li>
                <li>
                    <span>Usuários</span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('users.index') }}"><span>Listar Usuários</span></a></li>
                        <li><a href="{{ route('users.create') }}"><span>Novo Usuário</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </header>
    <main>
        @yield('content')        
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
    @hasSection ('javascript')
        @yield('javascript')
    @endif
</body>
</html>