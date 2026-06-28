<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // 1. LISTADO Y BUSCADOR
    public function index(Request $request)
    {
        $query = Pet::query();

        if ($request->has('search') && $request->search != '') {
            $buscar = $request->search;
            
            $query->where(function($q) use ($buscar) {
                $q->where('name', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('species', 'LIKE', '%' . $buscar . '%');
            });
        }

        $pets = $query->latest()->paginate(5)->appends($request->query());
        $search = $request->search ?? '';

        return view('pets.index', compact('pets', 'search'));
    }

    // 2. MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('pets.create');
    }

    // 3. GUARDAR LA NUEVA MASCOTA
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string|max:100',
            'age' => 'required|integer|min:0',
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index')->with('success', '¡Mascota registrada con éxito!');
    }

    // 4. MOSTRAR FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    // 5. PROCESAR LA ACTUALIZACIÓN
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string|max:100',
            'age' => 'required|integer|min:0'
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        return redirect()->route('pets.index')->with('success', 'Mascota actualizada correctamente');
    }

    // 6. ELIMINAR MASCOTA
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Mascota eliminada correctamente');
    }
}