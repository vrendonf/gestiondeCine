<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); 
        return view('rooms.index', compact('rooms')); 
    }

   
    public function create()
    {
        return view('rooms.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

      
        $room = new Room();
        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Sala creada con éxito.');
    }

    // Mostrar una sala específica
    public function show(Room $room)
    {
        return view('rooms.show', compact('room')); // Pasa la sala a la vista
    }

        public function edit($id)
    {
        $room = Room::findOrFail($id); 
        return view('rooms.edit', compact('room')); 

    } 
        public function update(Request $request, Room $room)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        
        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Sala actualizada con éxito.');
    }

    // Eliminar una sala
    public function destroy(Room $room)
    {
        $room->delete(); // Elimina la sala
        return redirect()->route('rooms.index')->with('success', 'Sala eliminada con éxito.');
    }
}
