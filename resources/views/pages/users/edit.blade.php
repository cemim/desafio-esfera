@extends('layouts.template')

@section('title', 'Cadastrar e Editar Usuário')

@section('content')
    <div class="title-1">
        <h1>Cad/Edit Usuário</h1>
    </div>
    <div class="form-container">
        <form action="{{request()->routeIs('users.create') ? route('users.store') : route('users.update', $user->id)}}" method="POST">
            @if (request()->routeIs('users.edit'))
                @method('PUT')
            @endif
            @csrf
            <ul class="flex-ul">
                <li>
                    <label for="name_in">Nome</label>
                    <input type="text" name="name" id="name_in" placeholder="Nome" value="{{ isset($user) ? $user->name : '' }}">
                </li>
                <li>
                    <label for="email_in">E-mail</label>
                    <input type="email" name="email" id="email_in" placeholder="E-mail" value="{{ isset($user) ? $user->email : '' }}">
                </li>                
                <li>
                    <label for="password_in">Senha</label>
                    <input type="password" name="password" id="password_in" placeholder="Senha">
                </li>
                <li>
                    <button type="submit">Enviar</button>
                </li>
            </ul>
        </form>
    </div>

@endsection
