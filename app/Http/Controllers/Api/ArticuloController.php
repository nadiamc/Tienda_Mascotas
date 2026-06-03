<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function index()
    {
        return Articulo::with('categoria')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        return Articulo::create($request->all());
    }

    public function show(string $id)
    {
        return Articulo::with('categoria')->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->update($request->all());

        return $articulo;
    }

    public function destroy(string $id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();

        return response()->noContent();
    }
}
