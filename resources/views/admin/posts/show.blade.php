@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->created_at }}</address>
        <p>Categoria: @if($post->category) {{ $post->category->name }} @else - @endif</p>
        <p>Tags:
            @forelse ($post->tags as $tag)
            #{{ $tag->name }} 
        @empty
            -
        @endforelse</p>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Indietro</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary mx-2">Modifica</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Cancella</button>
            </form>
        </div>
    </div>
@endsection