@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <div class="title-1">
        <h1>Dashboard</h1>
    </div>    
    <div class="cards">
        <div class="card">
            <div class="card-title">
                <h2>Tarefas</h2>
            </div>
            <div class="card-content">
                <p>Listar as tarefas do sistema</p>
                <a href="{{ route('tasks.index') }}" class="button">Listar</a>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Usuários</h2>
            </div>
            <div class="card-content">
                <p>Listar as usuários</p>
                <a href="{{ route('users.index') }}" class="button">Listar</a>
            </div>
        </div>
    </div>
@endsection
