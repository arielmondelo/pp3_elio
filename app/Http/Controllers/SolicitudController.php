<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Entidad;
use App\Models\Contrato;
use App\Models\TipoSolicitud;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudRequest
;


class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::all();
        $solicitudes = Solicitud::all();
        $tipoSolitudes = TipoSolicitud::all();

        return view('solicitudes.mostrar', compact('solicitudes' , 'contratos', 'tipoSolitudes'));
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
    public function store(SolicitudRequest $request)
    {
        $solicitud = Solicitud::create($request->validated());
        $solicitud->save();
        return redirect()->route('solicitudes.mostrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Solicitud::where('id', $id)
        ->update([
            'numeroExpediente' => $request->numeroExpediente,
            'fechaInicio'=> $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'estado'  => $request->estado,
            'descripcion' => $request->descripcion,
            'nombreProducto' => $request->nombreProducto,
            'versionProducto' => $request->versionProducto,
            'contrato' => $request->contrato,
            'entidad_id' => $request->entidad_id,
            'tipoSolicitud_id' => $request->tipoSolicitud_id, 

    ]);


        session()->flash('status', 'Solicitud editada con éxito');

        return redirect()->route('solicitudes.mostrar');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminarSolicitud(Request $request, $id)
    {
        if ($request->ajax()) {
            $solicitud = Solicitud::findOrFail($id);

            if ($solicitud->delete()) {
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
