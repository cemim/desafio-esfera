@extends('layouts.template')

@section('title', 'Lista')

@section('content')
    <div class="title-1">
        <h1>Lista de Usuários</h1>
    </div>
    <table class="table-main" id="table-partners">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>                
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>                    
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}"><button class="button">Detalhar</button></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
