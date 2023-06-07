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
  /*   public function store(EntornoVirtualRequest $request)
    {
        $entornoVirtual = EntornoVirtual::create($request->validated());
        $entornoVirtual->save();
        return redirect()->route('entornosVirtuales.mostrar');
    } */
    public function store(Request $request)
    {
        $request->validate([
            'nombreMV'=> 'string|required',
            'capacidadDisco' => 'int|required',
            'memoriaRAM' => 'int|required',
            'arquitectura'=>'string|required',
            'sistemaOperativo' => 'string|required',
            'contrasena' => 'string',
            'solicitud_id' => 'integer|required',
        ]);

        $entorno = new EntornoVirtual();
        $entorno->solicitud_id = $request->input('solicitud_id');
        $entorno->nombreMV = $request->input('nombreMV');
        $entorno->capacidadDisco = $request->input('capacidadDisco');
        $entorno->memoriaRAM =  $request->input('memoriaRAM');
        $entorno->arquitectura =  $request->input('arquitectura');
        $entorno->sistemaOperativo =  $request->input('sistemaOperativo');
        $entorno->contrasena =  $request->input('contrasena');
        $entorno->save();

        return redirect()->route('entornosVirtuales.mostrar')->with('success', 'Usuario creado con éxito');

        /* dd($request); */

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
        "solicitud_id" => $request->solicitud_id,
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
