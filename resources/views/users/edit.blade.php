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
                <label for="domicilio" class="form-label">Domicilio:</label>
                <input type="text" name="domicilio" value="{{ $user->domicilio }}" class="form-control" id="domicilio" required>
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
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
