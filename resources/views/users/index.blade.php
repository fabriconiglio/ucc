@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista de Usuarios</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Domicilio</th>
                <th>Profesiones</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address ? $user->address->street . ', ' . $user->address->city : 'No definido' }}</td>
                    <td>{{ $user->professions->pluck('name')->implode(', ') }}</td>
                    <td class="d-flex">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info mr-2">Editar</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
    </div>
@endsection
