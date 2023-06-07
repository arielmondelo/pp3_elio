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
        return view('entornosVirtuales', compact('entornosVirtuales' , 'solicitudes'));
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
        return redirect()->route('entornoVirtual.mostrar');
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
    public function update(Request $request, EntornoVirtual $entornoVirtual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntornoVirtual $entornoVirtual)
    {
        //
    }
}
