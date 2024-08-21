<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $products = Movie::all(); 
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
      
           
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->restriction = $request->restriction;
        $movie->duration = $request->duration;
        $movie->price = $request->product_price;
    
        $movie->save();
        return redirect()->route('movies.index')->with('success');

    
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $product = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
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

    return redirect()->route('movies.index')->with('success');
}
    

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success');
    }


}

