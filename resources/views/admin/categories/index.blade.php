@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Le mie categorie</h1>
        {{-- alert delete category--}}
        @if (session('delete'))
            <div class="my-3">
                <div class="alert alert-danger" role="alert">
                    Eliminato con successo la categoria {{ session('delete') }}!
                </div>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope='col'>Categoria</th>
                    <th scope="col">Colore</th>
                    <th scope='col'>Totale post</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->color }}</td>
                    <td>@if($category->posts) {{ count($category->posts) }} @else 0 @endif</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-primary">Vai</a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Cancella</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Non ci sono categorie</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection