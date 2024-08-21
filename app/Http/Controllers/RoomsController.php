<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); // Recupera todas las salas de la base de datos
        return view('rooms.index', compact('rooms')); // Pasa las salas a la vista
    }

    // Mostrar el formulario para crear una nueva sala
    public function create()
    {
        return view('rooms.create'); // Muestra la vista de creación de salas
    }

    // Guardar una nueva sala
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        // Crear una nueva sala
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

    // Mostrar el formulario para editar una sala existente
    public function edit($id)
    {
        $room = Room::findOrFail($id); // Encuentra la sala por su ID
        return view('rooms.edit', compact('room')); // Pasa la sala a la vista de edición
    }

    // Actualizar los datos de una sala existente
    public function update(Request $request, Room $room)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        // Actualizar la sala
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
