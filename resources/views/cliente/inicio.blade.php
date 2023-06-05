@extends('layouts.mainCliente')

@section('content')
    <h1>{{Auth::user()->name}} - con rol #{{Auth::user()->rol}} - Contenido</h1>
@endsection