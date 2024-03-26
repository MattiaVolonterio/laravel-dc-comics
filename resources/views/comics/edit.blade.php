@extends('template.app')

@section('page_title', 'Comics')

@section('main')
    <div class="container mt-3">
        <a href="{{ route('comics.index') }}" class="btn btn-primary my-3">Torna alla lista</a>
        <h1 class="mb-3">Modifica il fumetto {{ $comic->title }}</h1>

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required
                        value="{{ $comic->title }}">
                </div>

                <div class="col-6">
                    <label for="thumb" class="form-label">Image Url</label>
                    <input type="url" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
                </div>

                <div class="col-6">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}"
                        required>
                </div>

                <div class="col-6">
                    <label for="series" class="form-label">Serie</label>
                    <input type="text" class="form-control" id="series" name="series" required
                        value="{{ $comic->series }}">
                </div>

                <div class="col-6">
                    <label for="sale_date" class="form-label">Data di pubblicazione</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" required
                        value="{{ $comic->sale_date }}">
                </div>

                <div class="col-6">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="comic book" @if ($comic->type == 'comic book') selected @endif>Comic Book</option>
                        <option value="graphic novel" @if ($comic->type == 'graphic novel') selected @endif>Graphic Novel
                        </option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $comic->description }}</textarea>
                </div>

                <div class="col-2">
                    <button class="btn btn-success">Modifica</button>
                </div>
            </div>
        </form>
    </div>
@endsection
