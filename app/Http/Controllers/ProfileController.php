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
            $profile_photo = $user->profile_photo;
        }

        return view('profile')->with([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'genero' => $genero,
            'profile_photo' => $profile_photo,
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
            $profile_photo = $user->profile_photo;
        }

        return view('editProfile')->with([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'genero' => $genero,
            'profile_photo' => $profile_photo,
        ]);
    }

    public function editarPerfil(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $profilePhotoPath = $profilePhoto->store('images', 'public');
            $user->profile_photo = $profilePhotoPath;
        }

        // Validar los campos del formulario
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => ['image', 'max:2048']
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
