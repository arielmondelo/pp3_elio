<?php

namespace App\Http\Controllers;

use App\Models\Coordinador;
use App\Models\Entidad;
use Illuminate\Http\Request;
use App\Http\Requests\CoordinadorRequest;


class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coordinadores = Coordinador::all();
        $entidades = Entidad::all();
        return view('coordinadores.mostrar', compact('coordinadores', 'entidades'));
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
    public function store(CoordinadorRequest $request)
    {
        $coordinador = Coordinador::create($request->validated());
        $coordinador->save();
        return redirect()->route('coordinadores.mostrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinador $coordinador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinador $coordinador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Coordinador::where('id', $id)
        ->update([
        'entidad_id' => $request->entidad_id,
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'telefono' => $request->telefono,
        'correo' => $request->correo,
    ]);

        /* return redirect()->route('entidades.mostrar'); */
        /* ->with('success', 'Entidad editada'); */

        session()->flash('status', 'Coordinador editado con éxito');

        return redirect()->route('coordinadores.mostrar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinador $coordinador)
    {
        //
    }
    public function eliminarCoordinador(Request $request, $id)
    {
        if ($request->ajax()) {
            $coordinador = Coordinador::findOrFail($id);

            if ($coordinador->delete()) {
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
