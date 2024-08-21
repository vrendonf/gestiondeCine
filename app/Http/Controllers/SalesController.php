<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
 
    public function index()
    {
        $sales = Sale::all(); 
        return view('sales.index', compact('sales')); 
    }

    public function create()
    {
       
        return view('sales.create');
    }


    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'movie' => 'required|string|max:255',
            'room' => 'required|integer|min:0',
        ]);

        
        $sale = new Sale();
        $sale->price = $request->price;
        $sale->date = $request->date;
        $sale->movie = $request->movie;
        $sale->room = $request->room;
        $sale->save();

        return redirect()->route('sales.index')->with('success', 'Venta creada con éxito.');
    }

 
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale')); // Pasa la venta a la vista
    }


    public function edit($id)
    {
        $sale = Sale::findOrFail($id); 
        return view('sales.edit', compact('sale')); 
    }

    public function update(Request $request, Sale $sale)
    {
  
        $request->validate([
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'movie' => 'required|string|max:255',
            'room' => 'required|integer|min:0',
        ]);

        // Actualizar la venta
        $sale->update([
            'price' => $request->price,
            'date' => $request->date,
            'movie' => $request->movie,
            'room' => $request->room,
        ]);

        return redirect()->route('sales.index')->with('success', 'Venta actualizada con éxito.');
    }

    // Eliminar una venta
    public function destroy(Sale $sale)
    {
        $sale->delete(); 

        return redirect()->route('sales.index')->with('success', 'Venta eliminada con éxito.');
    }
}


