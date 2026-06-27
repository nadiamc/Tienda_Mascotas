<?php

namespace App\Http\Controllers; // 👈 Tiene que decir esto, SIN el "\Api" al final

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Muestra la pantalla con la tabla de mascotas
    public function index()
    {
        $pets = Pet::latest()->paginate(5);
        return view('pets.index', compact('pets')); // 👈 Verifica que use "view" y no "response()->json"
    }

    // Muestra la pantalla con el formulario de carga
    public function create()
    {
        return view('pets.create');
    }

    // Recibe los datos del formulario, los guarda y te redirige
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer'
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index')->with('success', '¡Mascota agregada con éxito!');
    }
}