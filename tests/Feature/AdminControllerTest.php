<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
        // Agrega más aserciones según sea necesario
    }

    public function testShow()
    {
        // Obtener las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            try {
                // Verificar si la tabla tiene registros
                $hasRecords = DB::table($tableName)->exists();
            } catch (QueryException $e) {
                // Si hay un error al acceder a la tabla, continuar con la siguiente
                continue;
            }

            if ($hasRecords) {
                // Si hay registros, simular una solicitud HTTP GET a la tabla
                $response = $this->get("/admin/show/$tableName");

                // Verificar que la respuesta sea exitosa (código de estado 200)
                $response->assertStatus(200);

                // Verificar que se cargue la vista 'admin.show'
                $response->assertViewIs('admin.show');
            } else {
                // Si no hay registros, simular una solicitud HTTP GET a la vista 'admin.empty'
                $response = $this->get("/admin/show/$tableName");

                // Verificar que la respuesta sea exitosa (código de estado 200)
                $response->assertStatus(200);

                // Verificar que se cargue la vista 'admin.empty'
                $response->assertViewIs('admin.empty');
            }
        }
    }

    public function testCreate()
    {
        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            // Simular una solicitud HTTP GET a la página de creación para la tabla actual
            $response = $this->get("/admin/create/$tableName");

            // Verificar que se devuelva el código de estado 200
            $response->assertStatus(200);

            // Agrega más aserciones según sea necesario
        }
    }

    
    public function testStore()
    {
        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);
            $validationRules = $this->getValidationRulesForTable($tableName);

            // Simular una solicitud HTTP POST a la ruta de almacenamiento para la tabla actual
            $response = $this->post("/admin/store/$tableName", [$validationRules]);

            // Verificar que se realice la redirección correctamente
            $response->assertRedirect(route('admin.show', $tableName));

            // Verificar que se inserten registros en la tabla actual
            $this->assertDatabaseCount($tableName, 1); // Ajusta el valor según lo esperado
        }
    }

    public function testEdit()
    {
        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);
            $recordId = 1; // Ajusta el ID del registro que deseas editar

            // Simular una solicitud HTTP GET a la página de edición para un registro específico
            $response = $this->get("/admin/edit/$tableName/$recordId");

            // Verificar que se devuelva el código de estado 200
            $response->assertStatus(200);

            // Agrega más aserciones según sea necesario
        }
    }

    public function testUpdate()
    {
        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);
            $recordId = 1; // Ajusta el ID del registro que deseas actualizar

            // Obtener las reglas de validación para la tabla específica
            $validationRules = $this->getValidationRulesForTable($tableName);

            // Simular una solicitud HTTP POST a la ruta de actualización para un registro específico
            $response = $this->post("/admin/update/$tableName/$recordId",[$validationRules]);

            // Verificar que se redirija correctamente después de la actualización
            $response->assertRedirect(route('admin.show', $tableName));

            // Agrega más aserciones según sea necesario
        }
    }

    //Reglas de validacion para cada tabla
    private function getValidationRulesForTable($tableName)
    {
        // Define las reglas de validación para cada tabla
        $validationRules = [
            'users' => [
                'campo1' => 'required|string',
                'campo2' => 'numeric',
                // Agrega las reglas de validación para los campos de la tabla 'users'
            ],
            'otra_tabla' => [
                'campo1' => 'required',
                'campo2' => 'email',
                // Agrega las reglas de validación para los campos de la tabla 'otra_tabla'
            ],
            // Agrega más tablas y sus reglas de validación según sea necesario
        ];

        return $validationRules[$tableName] ?? [];
    }

    public function testDestroy()
    {
        // Obtener todas las tablas de la base de datos
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);
            $recordId = 1; // Ajusta el ID del registro que deseas eliminar

            // Simular una solicitud HTTP POST a la ruta de eliminación para un registro específico
            $response = $this->post("/admin/destroy/$tableName/$recordId");

            // Verificar que se redirija correctamente después de la eliminación
            $response->assertRedirect(route('admin.show', $tableName));

            // Agrega más aserciones según sea necesario
        }
    }
}
