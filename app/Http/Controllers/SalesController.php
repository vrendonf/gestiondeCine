<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $products = Sale::all(); 
        return view('sales.index', compact('sale'));
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
      
           
        $sale = new Sale();
        $sale->price = $request->price;
        $sale->date = $request->date();
        $sale->movie = $request->movie;
        $sale->room = $request->room;
    
        $sale->save();
        return redirect()->route('rooms.index')->with('success');

    
    }

    public function show(Sale $sale)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $product = Movie::findOrFail($id);
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
{
    $request->validate([
        'price' => 'required',
        'date' => 'required',
        'movie' => 'required',
        'room' => 'required|integer',
        
    ]);

    $sale->update([
        'price' => $request->price,
        'date' => $request->date,
        'movie' => $request->movie,
        'room' => $request->room,
    ]);

    return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
}
    

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }


}
