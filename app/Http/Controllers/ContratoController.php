<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContratoRequest;
use App\Models\Contrato;
use App\Models\Entidad;
use App\Models\User;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::all();
        $entidades = Entidad::all();
        $usuarios = User::all();
        return view('contratos.mostrar', compact('contratos', 'entidades', 'usuarios'));
    }

    public function CobrosContratos()
    {
        $contratos = Contrato::with(['cobros'])->get();
        return view('contratos', compact('contratos'));
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
    public function store(ContratoRequest $request)
    {
        $contrato = Contrato::create($request->validated());
        /* $contrato->cobros()->sync($request->input('cobros', [])); */
        $contrato->save();
        return redirect()->route('contratos.mostrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Contrato::where('id', $id)
        ->update([
        'entidad_id' => $request->entidad_id,
        'user_id' => $request->user_id,
        'numeroContrato' => $request->numeroContrato,
        'fechaInicio' => $request->fechaInicio,
        'fechaFin' => $request->fechaFin,
        'descripcion' => $request->descripcion,
        'monto' => $request->monto,
        
    ]);

        session()->flash('status', 'Contrato editado con éxito');

        return redirect()->route('contratos.mostrar');

    }
        /*  */
    

    /**
     * Remove the specified resource from storage.
     */
    public function eliminarContrato(Request $request, $id)
    {
        if ($request->ajax()) {
            $contrato = Contrato::findOrFail($id);

            if ($contrato->delete()) {
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
