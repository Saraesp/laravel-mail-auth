@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2>Aggiungi nuovo post</h2>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
                <div class="form-group my-3">
                    <label for="" class="control-label">
                        <strong>Titolo:</strong> 
                    </label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Titolo">
                </div>
                <div class="form-group my-3">
                    <label for="" class="control-label">
                       <strong>Tipologie:</strong> 
                    </label>
                    <select class="form-control" name="type_id" id="type_id">
                        <option value="">Seleziona Tipologia</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="" class="control-label">
                       <strong>Tecnologie:</strong> 
                    </label>
                    @foreach($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">
                        @if($errors->any())
                        <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="">{{ $technology->name }}</label>

                        @else
                        <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]" {{ $post->technologies->contains($technology) ? 'checked' : ''}}>
                        @endif
                        <label class="form-check-label" for="">{{ $technology->name }}</label>
                    </div>
                    @endforeach
                    @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label for="" class="control-label">
                      <strong>Contenuto:</strong>  
                    </label>
                    <textarea name="content" id="content" class="form-control" placeholder="Contenuto"> </textarea>
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-sm btn-success">Salva post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection