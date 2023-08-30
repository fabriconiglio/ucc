@extends('layouts.app')

@section('title', 'Editar Profesión')

@section('content')
    <div class="container">
        <h2 class="mb-4">Editar Profesión: {{ $profession->name }}</h2>

        <form action="{{ route('professions.update', $profession) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ $profession->name }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
            <a href="{{ route('professions.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
        </form>
    </div>
@endsection
