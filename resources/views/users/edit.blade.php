@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Usuario: {{ $user->name }}</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" required>
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

            <!-- Calle -->
            <div class="mb-3">
                <label for="street" class="form-label">Calle:</label>
                <input type="text" name="address[street]" value="{{ $user->address->street ?? '' }}" class="form-control" id="street" required>
            </div>

            <!-- Ciudad -->
            <div class="mb-3">
                <label for="city" class="form-label">Ciudad:</label>
                <input type="text" name="address[city]" value="{{ $user->address->city ?? '' }}" class="form-control" id="city" required>
            </div>

            <!-- Estado/Provincia -->
            <div class="mb-3">
                <label for="state" class="form-label">Estado/Provincia:</label>
                <input type="text" name="address[state]" value="{{ $user->address->state ?? '' }}" class="form-control" id="state" required>
            </div>

            <!-- Código Postal -->
            <div class="mb-3">
                <label for="postal_code" class="form-label">Código Postal:</label>
                <input type="text" name="address[postal_code]" value="{{ $user->address->postal_code ?? '' }}" class="form-control" id="postal_code" required>
            </div>


            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
