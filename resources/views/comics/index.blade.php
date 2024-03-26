@extends('template.app')

@section('page_title', 'Comics')

@section('main')
    <div class="container mt-3">

        <a href="{{ route('comics.create') }}" class="btn btn-primary my-3">Inserisci un nuovo Fumetto</a>

        <h1>Comics List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Series</th>
                    <th scope="col">Type</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->type }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>
                            <a class="me-1" href="{{ route('comics.show', $comic) }}"><i
                                    class="fa-regular fa-eye"></i></a>
                            <a class="me-1" href="{{ route('comics.edit', $comic) }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                            <button type="button" class="modal-button" data-bs-toggle="modal"
                                data-bs-target="#delete-comic-{{ $comic->id }}">
                                <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                            </button>


                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun Fumetto Trovato</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $comics->links() }}
    </div>
@endsection

@section('modal')
    @foreach ($comics as $comic)
        <div class="modal fade" id="delete-comic-{{ $comic->id }}" tabindex="-1"
            aria-labelledby="delete-comic-{{ $comic->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare fumetto {{ $comic->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Premendo elimina l'azione sarà irreversibile. Procedere?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
