@extends('layouts.app')

@section('title', 'Agregar Profesión')

@section('content')
    <div class="container">
        <h2 class="mb-4">Agregar Profesión</h2>

        <form action="{{ route('professions.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            <a href="{{ route('professions.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
        </form>
    </div>
@endsection
