<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'johndoe@example.com';
        $user->password = Hash::make('password');
        $user->genero = 'Masculino';
        $user->save();

        $this->actingAs($user);

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertViewHas('id', $user->id);
        $response->assertViewHas('name', $user->name);
        $response->assertViewHas('email', $user->email);
        $response->assertViewHas('genero', $user->genero);
    }

    public function testEditPerfilview()
    {
        $user = new User();
        // Establecer las propiedades del usuario
        $user->name = 'John Doe';
        $user->email = 'johndoe@example.com';
        $user->password = Hash::make('password');
        $user->genero = 'Masculino';
        $user->save();

        $this->actingAs($user);

        $response = $this->get('/edit-profile');

        $response->assertStatus(200);
        $response->assertViewHas('id', $user->id);
        $response->assertViewHas('name', $user->name);
        $response->assertViewHas('email', $user->email);
        $response->assertViewHas('genero', $user->genero);
    }

    public function testEditarPerfil()
    {
        $user = new User();
        // Establecer las propiedades del usuario
        $user->name = 'John Doe';
        $user->email = 'johndoe@example.com';
        $user->password = Hash::make('password');
        $user->genero = 'Masculino';
        $user->save();

        $this->actingAs($user);

        $response = $this->post('/edit-profile', [
            'name' => 'Nuevo Nombre',
            'email' => 'nuevo@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Perfil actualizado correctamente');

        $user->refresh();

        $this->assertEquals('Nuevo Nombre', $user->name);
        $this->assertEquals('nuevo@example.com', $user->email);
        $this->assertTrue(Hash::check('newpassword', $user->password));
    }
}
