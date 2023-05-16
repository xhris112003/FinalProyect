<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $tablas = DB::select('SHOW TABLES');
        //dd($tablas);
        //die();
        return view('admin', compact('tablas'));
    }

    public function show($tabla)
    {
        // Obtener los registros de la tabla especificada
        $registros = DB::table($tabla)->get();

        if (!isset($registros) || $registros->isEmpty()) {
            // Mostrar mensaje de tabla vacía
            return view('admin.empty', compact('tabla'));
        }

        return view('admin.show', compact('registros', 'tabla'));
    }


    public function create($tabla)
    {
        // Obtener los nombres de las columnas de la tabla especificada
        $columnas = DB::getSchemaBuilder()->getColumnListing($tabla);

        return view('admin.create', compact('columnas', 'tabla'));
    }

    public function store(Request $request, $tabla)
    {
        // Validar los datos enviados por el usuario
        $validatedData = $request->validate([
            // Aquí puedes agregar las reglas de validación para cada campo
        ]);

        // Insertar los datos en la tabla especificada
        DB::table($tabla)->insert($validatedData);

        return redirect()->route('admin.show', $tabla);
    }

    public function edit($tabla, $id)
    {
        // Obtener el registro de la tabla especificada con el ID especificado
        $registro = DB::table($tabla)->where('id', $id)->first();

        return view('admin.edit', compact('registro', 'tabla'));
    }

    public function update(Request $request, $tabla, $id)
    {
        // Validar los datos enviados por el usuario
        $validatedData = $request->validate([
            // Aquí puedes agregar las reglas de validación para cada campo
        ]);

        // Actualizar el registro de la tabla especificada con el ID especificado
        DB::table($tabla)->where('id', $id)->update($validatedData);

        return redirect()->route('admin.show', $tabla);
    }

    public function destroy($tabla, $id)
    {
        // Eliminar el registro de la tabla especificada con el ID especificado
        DB::table($tabla)->where('id', $id)->delete();

        return redirect()->route('admin.show', $tabla);
    }
}
