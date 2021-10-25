@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>I miei post</h1>
            <a class="btn btn-info" href="{{ route('admin.posts.create') }}">Aggiungi nuovo post</a>
        </div>
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
                    <th scope='col'>Tag</th>
                    <th scope="col">Scritto il</th>
                    <th scope="col">Scritto da</th>
                    <th scope="col">Indirizzo</th>
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
                    <td>
                        @forelse ($post->tags as $tag)
                            <span class="badge" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td>@if($post->user) {{ $post->user->name }} @else - @endif</td>
                    <td>@if($post->user && $post->user->userInfo) {{ $post->user->userInfo->address}} @else - @endif</td>
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
                    <tr><td colspan="7" class="text-center">Non ci sono posts</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $posts->links() }}
        <div class="row mt-5">
            @foreach ($categories as $category)
                <div class="col-4 text-center my-3">
                    <div class="card bg-{{ $category->color }}">
                        <h4 class="my-0 py-2">{{ $category->name }}</h4>
                        <small>Totale post: @if($category->posts) {{ count($category->posts) }} @else - @endif</small>
                    </div>
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