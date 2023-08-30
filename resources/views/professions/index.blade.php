@extends('layouts.app')

@section('title', 'Listado de Profesiones')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Listado de Profesiones</h2>
            <a href="{{ route('professions.create') }}" class="btn btn-primary">Agregar Profesión</a>
        </div>

        <table class="table table-bordered table-hover mt-4">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($professions as $profession)
                <tr>
                    <td>{{ $profession->id }}</td>
                    <td>{{ $profession->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('professions.edit', $profession) }}" class="btn btn-warning btn-sm mr-2">Editar</a>
                        <form action="{{ route('professions.destroy', $profession) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar esta profesión?');">Eliminar</button>
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
    </div>
@endsection
