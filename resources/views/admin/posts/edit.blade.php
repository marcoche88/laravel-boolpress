@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica post</h1>
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

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Url immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
        </div>
        <div class="form-group">
            <label for="content">Testo del post</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="6" name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Categoria: </label>
            <select class="form-control" id="category_id" name="category_id">
              <option>Nessuna categoria</option>
              @foreach ($categories as $category)
                <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <h6>Tag:</h6>
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" @if(in_array($tag->id, old('tags', $tagIds))) checked @endif type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]">
                <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
            @endforeach
        </div>
          
        <button type="submit" class="btn btn-success">Invia</button>
    </form>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-secondary">Indietro</a>
    </div>
</div>
    
@endsection