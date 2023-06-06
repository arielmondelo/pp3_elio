<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntidadRequest;
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
        $tipo_entidades = TipoEntidad::all();
        return view('entidades.mostrar', compact('entidades', 'tipo_entidades'));
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

    public function store(EntidadRequest $request)
    {
        $entidad = Entidad::create($request->validated());
        $entidad->save();
        return redirect()->route('entidades.mostrar');
    }

    /* public function guardarEntidad(Request $request)
    {
        $entidad = new Entidad();
        $entidad->nombre = $request->nombre;
        $entidad->tipoEntidad_id = $request->tipoEntidad_id;
        $entidad->nombreRepresentante = $request->nombreRepresentante;
        $entidad->apellidosRepresentante = $request->apellidosRepresentante;
        $entidad->telefono = $request->telefono;
        $entidad->direccion = $request->direccion;
        $entidad->cuenta = $request->cuenta;
        $entidad->moneda = $request->moneda;
        $entidad->codigoReeup = $request->codigoReeup;
        $entidad->codigoNit = $request->codigoNit;
        $entidad->titular = $request->titular;
        $entidad->save();

        return redirect()->route('entidades.mostrar');
    } */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entidad = new Entidad();
        $entidad = Entidad::find($id);
        $entidad->TipoEntidad();
        return view('entidades.detalles', compact('entidad'));
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
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nombre'=>'string|required',
                'tipoEntidad_id'=>'integer|required',
                'nombreRepresentante'=>'string|required',
                'apellidosRepresentante'=>'string|required',
                'telefono'=>'string|required',
                'direccion'=>'string|required',
                'cuenta'=>'string|required',
                'moneda'=>'string|required',
                'codigoReeup'=>'string|required',
                'codigoNit'=>'string|required',
                'titular'=>'string|required',
            ]
        );
        $entidad = Entidad::find($id);
        $datos_actualizados = [
            'nombre' => $entidad->nombre = $request->input('nombre'),
            'tipoEntidad_id' => $entidad->tipoEntidad_id = $request->input('tipoEntidad_id'),
            'nombreRepresentante' => $entidad->nombreRepresentante = $request->input('nombreRepresentante'),
            'apellidosRepresentante' => $entidad->apellidosRepresentante = $request->input('apellidosRepresentante'),
            'telefono' => $entidad->telefono = $request->input('telefono'),
            'direccion' => $entidad->direccion = $request->input('direccion'),
            'cuenta' => $entidad->cuenta = $request->input('cuenta'),
            'moneda' => $entidad->moneda = $request->input('moneda'),
            'codigoReeup' => $entidad->codigoReeup = $request->input('codigoReeup'),
            'codigoNit' => $entidad->codigoNit = $request->input('codigoNit'),
            'titular'=>$entidad->titular = $request->input('titular'),
        ];
        $entidad->update($datos_actualizados);
        return redirect()->route('entidades.mostrar');

        /*  $entidad = Entidad::find($id);
         $datos = $request->validated();
         $entidad->update($datos);

          return redirect()->route('entidades.mostrar'); */
        /* ->with('success', 'Entidad editada'); */

        /* $request->session()->flash('alert-success', 'El contrato se ha guardado satisfactoriamente');
        return redirect()->route('entidades.mostrar'); */

        /* dd($request); */
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
