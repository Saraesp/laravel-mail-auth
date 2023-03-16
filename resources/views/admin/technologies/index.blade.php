@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between">
                 <div>
                    <h2>Elenco Tecnologie</h2>
                </div>
            </div>
        </div>
        <div class="col-12 my-5">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Azioni</th>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>{{ $technology->id }}</td>
                            <td>{{ $technology->name }}</td>
                            <td>{{ $technology->slug }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection