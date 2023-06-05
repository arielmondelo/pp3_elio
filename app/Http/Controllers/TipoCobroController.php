<?php

namespace App\Http\Controllers;

use App\Models\TipoCobro;
use Illuminate\Http\Request;

class TipoCobroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposCobros = TipoCobro::all();
        return view('tiposCobros', compact('tiposCobros'));
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
    public function show(TipoCobro $tipoCobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoCobro $tipoCobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoCobro $tipoCobro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoCobro $tipoCobro)
    {
        //
    }
}
