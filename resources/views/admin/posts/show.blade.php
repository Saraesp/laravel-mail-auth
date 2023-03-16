@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Dettaglio Post {{ $post->title }}</h2>
                </div>
                <div>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">Torna Indietro</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <p><strong>Slug:</strong> {{$post->slug}}</p>
            <p><strong>Tipologia:</strong> {{$post->type ? $post->type->name : 'Senza Tipologia'}}</p>
            <p><strong>Tecnologie:</strong> 
                @forelse($post->technologies as $technology)
                {{ $technology->name }}
                @empty
                Nessuna Tecnologia selezionata
                @endforelse
            </p>
            <label for="" class="d-block"><strong>Contenuto:</strong></label>
            <p>{{$post->content}}</p>
        </div>
    </div>
</div>
@endsection