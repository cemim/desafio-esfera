@extends('layouts.template')

@section('title', 'Cadastrar e Editar Tarefa')

@section('content')
    <div class="title-1">
        <h1>Cad/Edit Tarefa</h1>
    </div>
    <div class="form-container">
        <form action="{{request()->routeIs('tasks.create') ? route('tasks.store') : route('tasks.update', $task->id)}}" method="POST">
            @if (request()->routeIs('tasks.edit'))
                @method('PUT')
            @endif
            @csrf
            <ul class="flex-ul">
                <li>
                    <label for="titulo_in">Título</label>
                    <input type="text" name="titulo" id="titulo_in" placeholder="Título" value="{{ isset($task) ? $task->titulo : '' }}">
                </li>
                <li>
                    <label for="email_responsavel_in">E-mail</label>
                    <input type="email" name="email_responsavel" id="email_responsavel_in" placeholder="E-mail do responsável" value="{{ isset($task) ? $task->email_responsavel : '' }}">
                </li>
                <li>
                    <label for="status_id_sel">Status</label>
                    <select name="status_id" id="status_id_sel">
                        <option value="">Status</option>
                        @foreach ($statusList as $status)
                            {{ $selected = '' }}
                            @if (isset($task) && $status->id === $task->status_id)
                                {{ $selected = 'selected' }}
                            @endif
                            <option value="{{ $status->id }}" {{ $selected }}>{{ $status->status_nome }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="descricao_in">Descrição</label>
                    <textarea rows="6" name="descricao" id="descricao_in" placeholder="Descrição">{{ isset($task) ? $task->descricao : '' }}</textarea>
                </li>
                <li>
                    <button type="submit">Enviar</button>
                </li>
            </ul>
        </form>
    </div>

@endsection
