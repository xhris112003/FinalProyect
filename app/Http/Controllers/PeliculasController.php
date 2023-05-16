<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormByUserSaved;
use Illuminate\Support\Facades\Auth;

class PeliculasController extends Controller
{
    public function guardarPeliculas(Request $request)
    {
        $peliculas = $request->input('peliculas');
        
        $userId = Auth::id(); // Obtener el user_id del usuario autenticado

        // Guardar las películas en la base de datos
        foreach ($peliculas as $pelicula) {
            $formByUserSaved = new FormByUserSaved();
            $formByUserSaved->nombre_pelicula = $pelicula['titulo'];
            $formByUserSaved->foto_pelicula = $pelicula['imagen'];
            $formByUserSaved->user_id = $userId; // Asignar el user_id al modelo
            $formByUserSaved->save();
        }

        return response()->json(['message' => 'Peliculas guardadas exitosamente']);
    }

}