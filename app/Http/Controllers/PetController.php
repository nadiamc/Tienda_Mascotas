<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // El método index tiene que ir ACÁ ADENTRO, entre estas llaves

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
        $search = $request->search;

        return view('pets.index', compact('pets', 'search'));
    }

}