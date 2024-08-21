<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $products = Movie::all(); 
        return view('movie.index', compact('movie'));
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request)
    {
      
           
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->restriction = $request->restriction;
        $movie->duration = $request->duration;
        $movie->price = $request->product_price;
    
        $movie->save();
        return redirect()->route('movie.index')->with('success', 'Producto creado correctamente.');

    
    }

    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    public function edit($id)
    {
        $product = Movie::findOrFail($id);
        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
{
    $request->validate([
        'title' => 'required',
        'restriction' => 'required',
        'duration' => 'required',
        'price' => 'required|integer',
        
    ]);

    $movie->update([
        'title' => $request->title,
        'restriction' => $request->restriction,
        'duration' => $request->duration,
        'price' => $request->price,
    ]);

    return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
}
    

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }


}
