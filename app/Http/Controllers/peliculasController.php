<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peliculas;

class peliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelicula = peliculas::all();
        return \response($pelicula);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'sinopsis' => 'required|max:255',
            'estrellas' => 'required'
        ]);
        $crear = peliculas::create($request->all());
        return \response($crear);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = peliculas::findOrFail($id);
        return \response($pelicula);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = peliculas::findOrFail($id)
        ->update($request->all());
        return \response("pelicula actualizada");
    }

    /**S
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        peliculas::destroy($id);
        return \response("Pelicula eliminada correctamente id:${id}");
    }
}
