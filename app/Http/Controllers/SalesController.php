<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $movies = Sale::all(); // Recupera todas las películas de la base de datos
        return view('sales.index', compact('sales')); // Pasa las películas a la vista
    }

    // Guardar una nueva película
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'age_restriction' => 'required|integer|min:0',
            'duration' => 'required|numeric|min:0',
            'value' => 'required|numeric|min:0',
        ]);

        // Crear una nueva película
        Movie::create([
            'title' => $request->input('title'),
            'age_restriction' => $request->input('age_restriction'),
            'duration' => $request->input('duration'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('movies.index'); // Redirige a la lista de películas
    }

    // Mostrar el formulario para editar una película
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie')); // Pasa la película a la vista
    }

    // Actualizar los datos de una película existente
    public function update(Request $request, Movie $movie)
    {
        // Validación de los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'age_restriction' => 'required|integer|min:0',
            'duration' => 'required|numeric|min:0',
            'value' => 'required|numeric|min:0',
        ]);

        // Actualizar la película
        $movie->update([
            'title' => $request->input('title'),
            'age_restriction' => $request->input('age_restriction'),
            'duration' => $request->input('duration'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('movies.index'); // Redirige a la lista de películas
    }

    // Eliminar una película
    public function destroy(Movie $movie)
    {
        $movie->delete(); // Elimina la película

        return redirect()->route('movies.index'); // Redirige a la lista de películas
    }



}
