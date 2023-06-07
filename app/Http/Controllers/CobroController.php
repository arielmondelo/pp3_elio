<?php

namespace App\Http\Controllers;

use App\Http\Requests\CobroRequest;
use App\Models\Cobro;
use Illuminate\Http\Request;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cobros = Cobro::all();
        return view('cobros', compact('cobros'));
    }

    public function CobrosContratos()
    {
        $cobros = Cobro::with(['contratos'])->get();
        return view('cobros', compact('cobros'));
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
    public function store(CobroRequest $request)
    {
        $cobro = Cobro::create($request->validated());
        $cobro->contratos()->sync($request->input('contratos', []));
        $cobro->save();
        return redirect()->route('cobros.mostrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cobro $cobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cobro $cobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cobro $cobro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cobro $cobro)
    {
        //
    }
}
