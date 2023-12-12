@extends('layouts.template')

@section('title', 'Lista')

@section('content')
    <div class="title-1">
        <h1>Lista de Tarefas</h1>
    </div>    
    <ul class="flex-ul" style="margin: 30px">
        <li>
            <label for="filtroStatus">Filtrar</label>
            <input type="text" id="filtroStatus" placeholder="Filtrar por Status">
        </li>
    </ul>
    <table class="table-main" id="table-list">
        <thead>
            <tr>
                <th onclick="ordenarTabela(0)">ID</th>
                <th onclick="ordenarTabela(1)">Título</th>
                <th onclick="ordenarTabela(2)">Descrição</th>
                <th onclick="ordenarTabela(3)">Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->titulo }}</td>
                    <td>{{ $task->descricao }}</td>
                    <td>{{ $task->status->status_nome }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}"><button class="button">Detalhar</button></a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-danger">Excluir</button>                            
                        </form>                        
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
