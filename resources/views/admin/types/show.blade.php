@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Dettaglio Tipologia {{ $type->name }} <span>({{$type->slug}})</span></h2>
                </div>
                <div>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">Torna Indietro</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <p><strong>Slug:</strong>{{ $type->slug }}</p>
        </div>
        <div class="col-12">
            <h4>Post Appartenenti a questa Tipologia</h4>
            <div class="row mt-3">
                @forelse ($type->posts as $post)
                    <div class="col-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $post->title }}</h5>
                                <p>{{ $post->content }}</p> 
                                <a class="btn btn-sm btn-primary" href="{{route('admin.posts.show', $post->slug)}}">Continua a leggere</a>
                            </div>                
                        </div>
                    </div>
                @empty
                    <h3 class="text-center">Non ci sono post per questa Tipologia</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection