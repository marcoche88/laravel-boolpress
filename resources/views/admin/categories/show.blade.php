@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nome: {{ $category->name }}</h1>
        <p>Colore: {{ $category->color }}</p>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Indietro</a>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-secondary mx-2">Modifica</a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Cancella</button>
            </form>
        </div>
    </div>
@endsection