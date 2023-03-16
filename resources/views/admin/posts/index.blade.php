@extends('layouts.admin');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between">
                 <div>
                    <h2>Elenco posts</h2>
                </div>
                <div>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-sm btn-primary">Aggiungi Post</a>
                </div>
            </div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th>Azioni</th>
                </thead>

                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-sm btn-square btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-sm btn-square btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->slug) }}" class="d-inline-block"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-square btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row">
                            Nessun Post, aggiungi uno da qui: <a href="{{ route('admin.posts.create') }}">qui</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection