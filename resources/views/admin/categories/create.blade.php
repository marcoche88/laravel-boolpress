@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea una nuova categoria</h1>
    {{-- errori di validazione del form --}}
    @if ($errors->any())
        <div class="alert alert-danger my-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
             @endforeach
            </ul>
        </div> 
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome categoria: </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', '') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>
        <div class="form-group">
            <label for="color">Colore Bootstrap: </label>
            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', '') }}">
            @error('color')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Invia</button>
    </form>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Indietro</a>
    </div>
</div>
    
@endsection