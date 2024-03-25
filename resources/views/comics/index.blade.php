@extends('template.app')

@section('page_title', 'Comics')

@section('main')
    <div class="container mt-3">
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
                    <th scope="col">More...</th>
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
                        <td><a href="{{ route('comics.show', $comic) }}">See more</a></td>
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
