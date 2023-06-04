<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutenticadorController extends Controller
{

    public function login (Request $request){

        $credenciales = $request->validate(
            [
                'correo'=>'required|email',
                'contrasena'=>'required|string',
            ]
        );
        if (Auth::attempt($credenciales)){
            $token = Auth::user()->createToken('token')->plainTextToken;
            $mensaje = 'Usuario autenticado correctamente';
            return view('sesion.login', compact($token, $mensaje));
        }
        else{
            return  redirect('autenticador.login');
        }
    }

    public function logout(){
        $user = Auth::user();
        $user->currentAccessToken()->delete();
    }
}
