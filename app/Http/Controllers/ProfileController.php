<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
            $genero = $user->genero;
        }

        return view('profile')->with([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'genero' => $genero,
        ]);
    }

    public function editPerfilview()
    {
        $user = Auth::user();

        if ($user) {
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
            $genero = $user->genero;
        }

        return view('editProfile')->with([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'genero' => $genero,
        ]);
    }

    public function editarPerfil(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Validar los campos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Actualizar los datos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->back()->with('success', 'Perfil actualizado correctamente');
    }
}
