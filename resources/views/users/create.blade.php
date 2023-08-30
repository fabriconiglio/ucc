@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Agregar Usuario</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio:</label>
                <input type="text" class="form-control" id="domicilio" name="domicilio" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="professions" class="form-label">Profesiones:</label>
                <select name="professions[]" multiple class="form-control" id="professions">
                    @foreach($professions as $profession)
                        <option value="{{ $profession->id }}"
                                @if(isset($user) && $user->professions->contains($profession)) selected @endif>
                            {{ $profession->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
@endsection
