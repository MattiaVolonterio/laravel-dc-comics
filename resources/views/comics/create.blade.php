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
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="col-6">
                    <label for="thumb" class="form-label">Image Url</label>
                    <input type="url" class="form-control" id="thumb" name="thumb">
                </div>

                <div class="col-6">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="ex.price $19.99"
                        required>
                </div>

                <div class="col-6">
                    <label for="series" class="form-label">Serie</label>
                    <input type="text" class="form-control" id="series" name="series" required>
                </div>

                <div class="col-6">
                    <label for="sale_date" class="form-label">Data di pubblicazione</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" required>
                </div>

                <div class="col-6">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="comic book">Comic Book</option>
                        <option value="graphic novel">Graphic Novel</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="col-2">
                    <button class="btn btn-success">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection
