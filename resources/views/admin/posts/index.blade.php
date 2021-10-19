@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>I miei post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Scritto il</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
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
    </div>
@endsection