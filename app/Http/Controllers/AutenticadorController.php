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
            return response()->json(['mensaje'=>'Usuario autenticado', 'token'=>$token],  Response::HTTP_ACCEPTED);
        }
        else{
            return  response()->json(['mensaje'=>'Credenciales inválidas'],  Response::HTTP_UNAUTHORIZED);
        }
    }

    public function logout(){
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response()->json(["mensaje"=>"Sesión cerrada con éxito"], Response::HTTP_OK);
    }
}
