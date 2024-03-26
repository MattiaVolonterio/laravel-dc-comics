@extends('template.app')

@section('page_title', 'Comics')

@section('main')
    <div class="container mt-3">
        <a href="{{ route('comics.index') }}" class="btn btn-primary my-3">Torna alla lista</a>
        <a href="{{ route('comics.edit', $comic) }}" class="btn btn-primary my-3">Modifica Dettagli</a>
        <h1>#{{ $comic->id }}: {{ $comic->title }}</h1>

        <div class="row">
            <div class="col-6">
                <img src="{{ $comic->thumb }}" alt="{{ $comic->series }}" class="img-fluid mt-3 comics-image">
            </div>

            <div class="col-6">
                <h2 class="h4 mt-3">Description:</h2>
                <p class="mt-3">{{ $comic->description }}</p>
                <div class="row mt-3">
                    <div class="col-6">
                        <h2 class="h5 mt-3 d-inline">Series: </h2>
                        <span>{{ $comic->series }}</span>
                    </div>

                    <div class="col-6">
                        <h2 class="h5 mt-3 d-inline">Type: </h2>
                        <span>{{ $comic->type }}</span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <h2 class="h5 mt-3 d-inline">Price: </h2>
                        <span>{{ $comic->price }}</span>
                    </div>

                    <div class="col-6">
                        <h2 class="h5 mt-3 d-inline">Sale Date: </h2>
                        <span>{{ $comic->sale_date }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
