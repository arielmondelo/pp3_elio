<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TrazaUsuario;
use App\Models\TrazaContrato;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loggued_rol = auth()->user()->rol;

        if ($loggued_rol == 3) {
            return view('cliente.inicio');
        }
        elseif ($loggued_rol == 1) {
            return view('admin.admin');
        }
    }

    public function CrearUser()
    {
        $usuarios = User::all();  
        return view('admin.crear-user', compact('usuarios'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'rol' => 'required',
            'nombre' => 'required|min:4',
            'correo' => 'required|email|unique:users,email',
            'pass' => 'required|min:8',
        ]);

        $user = new User();
        $user->rol = $request->input('rol');
        $user->name = $request->input('nombre');
        $user->email = $request->input('correo');
        $user->password = bcrypt($request->input('pass'));
        $user->save();

        $traza = new TrazaUsuario();
        $traza->tipoTraza = 'Creación';
        $traza->usuarioDest = $request->input('nombre');
        $traza->emailDest = $request->input('correo');        
        $traza->usuarioCrea = Auth::user()->email;
        $traza->save();

        return redirect()->route('crear-usuario')->with('success', 'Usuario creado con éxito');
    }

    public function trazasUser()
    {
        $trazas = TrazaUsuario::all();
        return view('admin.trazas-usuario', compact('trazas'));
    }   

    public function trazasContrato()
    {
        $trazas = TrazaContrato::all();
        return view('admin.trazas-contrato', compact('trazas'));
    }   

    public function eliminarUsuario(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::findOrFail($id);

            $traza = new TrazaUsuario();
            $traza->tipoTraza = 'Eliminación';
            $traza->emailDest = $user->email;
            $traza->usuarioDest = $user->name;
            $traza->usuarioCrea = Auth::user()->email;
            $traza->save();

            if ($user->delete()) {
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
