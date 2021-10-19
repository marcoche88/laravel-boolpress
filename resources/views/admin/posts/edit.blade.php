@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica post</h1>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="image">Url immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
        </div>
        <div class="form-group">
            <label for="content">Testo del post</label>
            <textarea class="form-control" id="content" rows="6" name="content">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Invia</button>
    </form>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-secondary">Indietro</a>
    </div>
</div>
    
@endsection