@extends('template.app')

@section('page_title', 'Comics')

@section('main')
    <div class="container mt-3">
        <a href="{{ route('comics.index') }}" class="btn btn-primary my-3">Torna alla lista</a>

        <h1 class="mb-3">Inserisci un nuovo fumetto</h1>

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="thumb" class="form-label">Image Url</label>
                    <input type="url" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                        name="thumb" value="{{ old('thumb') }}">
                    @error('thumb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" placeholder="ex.price $19.99" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="series" class="form-label">Serie</label>
                    <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"
                        name="series" value="{{ old('series') }}" required>
                    @error('series')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="sale_date" class="form-label">Data di pubblicazione</label>
                    <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                        name="sale_date" value="{{ old('sale_date') }}" required>
                    @error('sale_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type"
                        value="{{ old('type') }}" required>
                        <option value="comic book" @if (old('type') == 'comic book') selected @endif>Comic Book</option>
                        <option value="graphic novel" @if (old('type') == 'graphic novel') selected @endif>Graphic Novel
                        </option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-2">
                    <button class="btn btn-success">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection
