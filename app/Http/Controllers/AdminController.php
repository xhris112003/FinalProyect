<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Middlewares\RoleMiddleware;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', RoleMiddleware::class . ':admin']);
    }

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
        if ($tabla == 'users') {
            $valor = $request->input('valor');

            $validatedData = $request->validate([
                'name' => ['required', 'regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9]{4,}$/'],
                'email' => 'required|email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&\.]{8,}$/'
                ],
                'genero' => 'required',
                'created_at' => 'required',
                'updated_at' => 'required',

            ]);

            // Verificar si se proporcionó una nueva contraseña
            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $id = DB::table($tabla)->insertGetId($validatedData);
            $usuario = User::find($id);

            if ($valor === "false") {
                // Asignar el rol de administrador al usuario
                $usuario->assignRole('admin');
            }else{
                $usuario->assignRole('user');
            }

            return redirect()->route('admin.show', $tabla);
        } else { // otras tablas
            $validatedData = $request->validate($request->all());

            DB::table($tabla)->insert($validatedData);

            return redirect()->route('admin.show', $tabla);
        }
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
        if ($tabla == 'users') {
            $validatedData = $request->validate([
                'name' => ['required', 'regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9]{4,}$/'],
                'email' => 'required|email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&\.]{8,}$/'
                ],
            ]);

            // Verificar si se proporcionó una nueva contraseña
            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
        } else if ($tabla == 'roles') {
            $validatedData = $request->validate([
                'name' => ['required', 'alpha'],
                'guard_name' => ['required', 'alpha'],
            ]);
        } else if ($tabla == 'forms_by_users_saved') {
            $validatedData = $request->validate([
                'nombre_pelicula' => 'required',
                'foto_pelicula' => 'required',
            ]);
        }
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
