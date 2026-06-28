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

    // 2. MOSTRAR FORMULARIO DE CREACIÓN (El que te está pidiendo la URL ahora)
    public function create()
    {
        return view('pets.create');
    }

    // 3. GUARDAR LA NUEVA MASCOTA EN LA BASE DE DATOS
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
}