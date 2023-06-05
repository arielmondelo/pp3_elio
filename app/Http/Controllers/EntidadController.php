<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;
use App\Models\TipoEntidad;

class EntidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidades = Entidad::all();
        /* $tipo_entidades = TipoEntidad::all(); */
        return view('entidades.mostrar', compact('entidades'/* , 'tipo_entidades' */));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Entidad $entidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entidad $entidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entidad $entidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminarEntidad(Request $request, $id)
    {
        if ($request->ajax()) {
            $entidad = Entidad::findOrFail($id);

            if ($entidad->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => '¡Satisfactorio!, eliminado con éxito.',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => '¡Error!, No se pudo eliminar.',
                ]);
            }
        }
    }
}
