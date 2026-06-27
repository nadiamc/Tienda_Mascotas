<?php

namespace App\Http\Controllers\Api; //  Ahora dice Api al final

use App\Http\Controllers\Controller; //  Sumamos esto para que no falle la herencia
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Muestra todas las mascotas en formato JSON (de 5 en 5)
    public function index()
    {
        $pets = Pet::latest()->paginate(5);
        return response()->json($pets);
    }

    // Guarda una nueva mascota desde la API y avisa si salió todo bien
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer'
        ]);

        $pet = Pet::create($request->all());

        return response()->json([
            'message' => 'Mascota creada con éxito',
            'data' => $pet
        ], 201); // Código 201: Creado correctamente
    }
}