<?php

namespace App\Http\Controllers;

use App\Models\EntornoVirtual;
use App\Models\Solicitud;

use Illuminate\Http\Request;
use App\Http\Requests\EntornoVirtualRequest;

class EntornoVirtualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entornosVirtuales = EntornoVirtual::all();
        $solicitudes = Solicitud::all();
        return view('entornosVirtuales.mostrar', compact('entornosVirtuales' , 'solicitudes'));
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
    public function store(EntornoVirtualRequest $request)
    {
        $entornoVirtual = EntornoVirtual::create($request->validated());
        $entornoVirtual->save();
        return redirect()->route('entornosVirtuales.mostrar');
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(EntornoVirtual $entornoVirtual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntornoVirtual $entornoVirtual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        EntornoVirtual::where('id', $id)
        ->update([
        'nombreMV' => $request->nombreMV,
        'estado' => $request->estado,
        'capacidadDisco' => $request->capacidadDisco,
        'memoriaRAM' => $request->memoriaRAM,
        'arquitectura' => $request->arquitectura,
        'sistemaOperativo' => $request->sistemaOperativo,
        'contrasena' => $request->contrasena,
    ]);

        /* return redirect()->route('entidades.mostrar'); */
        /* ->with('success', 'Entidad editada'); */

        session()->flash('status', 'Maquina Virtual editado con éxito');

        return redirect()->route('entornosVirtuales.mostrar');
    }

    /**
     * Remove the specified resource from storage.
     */
   
    public function eliminarEntornoVirtual(Request $request, $id)
    {
        if ($request->ajax()) {
            $entornoVirtual = EntornoVirtual::findOrFail($id);

            if ($entornoVirtual->delete()) {
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
