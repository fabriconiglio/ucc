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

            <div class="mb-3">
                <label for="street" class="form-label">Calle:</label>
                <input type="text" class="form-control" id="street" name="address[street]" required>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Ciudad:</label>
                <input type="text" class="form-control" id="city" name="address[city]" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">Estado/Provincia:</label>
                <input type="text" class="form-control" id="state" name="address[state]" required>
            </div>

            <div class="mb-3">
                <label for="postal_code" class="form-label">Código Postal:</label>
                <input type="text" class="form-control" id="postal_code" name="address[postal_code]" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
@endsection
