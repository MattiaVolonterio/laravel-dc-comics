<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $comics = Comic::paginate(10);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate_form($request);

        $data = $request->all();
        $new_comic = new Comic;
        $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic)->with('message', 'fumetto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     */
    public function update(Request $request, Comic $comic)
    {

        $this->validate_form($request);

        $data = $request->all();
        $comic->update($data);
        return redirect()->route('comics.show', compact('comic'))->with('message', 'fumetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('message', 'fumetto eliminato con successo');
    }

    private function validate_form($request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'string|nullable',
            'thumb' => 'url|nullable',
            'price' => 'required|string|max:10|starts_with:$',
            'series' => 'required|string|max:50',
            'sale_date' => 'required|date',
            'type' => ['required', Rule::in(['comic book', 'graphic novel'])]
        ], [
            'title.required' => 'Il titolo non può essere vuoto',
            'title.string' => "Il titolo dev'essere una stringa",
            'title.max' => "Il titolo dev'essere più corto di 100 caratteri",
            'description.string' => "La descrizione dev'essere un testo",
            'thumb.url' => "thumb deve contenere un'URL",
            'price.required' => "Il prezzo non può essere vuoto",
            'price.max' => "Il prezzo non può essere più lungo di 10 caratteri",
            'price.starts_with' => "Il prezzo deve cominciare con $",
            'series.required' => "La serie non può essere vuota",
            'series.max' => "La serie non può essere più lunga di 50 caratteri",
            'sale_date.required' => "La data non può essere vuota",
            'type.required' => "Il tipo non può essere vuoto",
        ]);
    }
}
