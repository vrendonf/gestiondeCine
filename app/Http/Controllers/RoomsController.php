<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $products = Room::all(); 
        return view('rooms.index', compact('room'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
      
           
        $room = new Room();
        $room->name = $request->name;
        $room->capacity = $request->capacity;
       
    
        $room->save();
        return redirect()->route('rooms.index')->with('success');

    
    }

    public function show(Room $movie)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $product = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $movie)
{
    $request->validate([
        'name' => 'required',
        'capacity' => 'required',
       
    ]);

    $movie->update([
        'name' => $request->title,
        'capacity' => $request->capacity,
       
    ]);

    return redirect()->route('products.index')->with('success');
}
    

    public function destroy(Room $movie)
    {
        $movie->delete();
        return redirect()->route('rooms.index')->with('success');
    }
}
