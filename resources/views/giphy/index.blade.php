@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>GIFs de Giphy</h1>
        @foreach($gifs as $gif)
            <img src="{{ $gif->images->original->url }}" alt="GIF" class="img-fluid mb-3">
        @endforeach
    </div>
@endsection
