@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea un nuovo post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="image">Url immagine</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="content">Testo del post</label>
            <textarea class="form-control" id="content" rows="6" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Invia</button>
    </form>
</div>
    
@endsection