@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei post</h1>
        {{-- alert delete post--}}
        @if (session('delete'))
            <div class="my-3">
                <div class="alert alert-danger" role="alert">
                    Eliminato con successo il post numero {{ session('delete') }}!
                </div>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope='col'>Categoria</th>
                    <th scope="col">Scritto il</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>@if($post->category)
                            <span class="badge badge-{{ $post->category->color }} p-2">{{ $post->category->name }}</span>
                        @else 
                            - 
                        @endif
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Vai</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Cancella</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Non ci sono posts</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $posts->links() }}
        <div class="row mt-5">
            @foreach ($categories as $category)
                <div class="col-4 text-center my-3">
                    <h4 class="card mb-0 py-2 bg-{{ $category->color }}">{{ $category->name }}</h4>
                    <ul class="list-group mt-0">
                        @forelse ($category->posts as $post)
                            <li class="list-group-item">{{ $post->title }}</li>
                        @empty
                            <li class="list-group-item">Nessun Post</li>
                        @endforelse   
                    </ul>
                </div>   
            @endforeach
        </div>
    </div>
@endsection