<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

use App\Models\User;

class ApiTest extends TestCase
{
    protected $user;

    /**
     * Base de usuario.
     *
     * @return void
     */
    public function setUp(): void
{
    parent::setUp();

    $this->user = User::create([
        'name' => 'Test Doe',
        'email' => 'testdoe@example.com',
        'password' => bcrypt('password'),
        'password_confirmation' => bcrypt('password'),
        'genero' => 'otro'
    ]);
}


/**
 * 
 * Test de registro y login de usuario
 * 
 */

    public function test_user_can_register()
{
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test2@example.com',
        'password' => 'password2',
        'password_confirmation' => 'password2',
        'genero' => 'hombre'
    ]);

    $response->assertRedirect('/home');
    $this->assertAuthenticated();
    $user = User::where('email', 'testdoe@example.com')->first();
    $this->assertEquals('Test Doe', $user->name);
}

public function testLogin()
{
    $response = $this->post('/login', [
        'email' => 'testdoe@example.com',
        'password' => 'password',
    ]);

    $response->assertRedirect('/home');
}

/**
 * 
 * Test del cuestionario para la API 
 * 
 */

public function test_movie_form_submission()
{
    //datos que recibimos del cuestionario
    $formData = [
        'sentimiento' => ['estresado', 'triste', 'feliz'],
        'apta-para-todo-publico' => 'si',
        'duracion' => 'larga',
        'maraton' => 'si'
    ];
    
    $clasificacion = 'G';
    $duracionMinima = ['corta' => 60, 'media' => 90, 'larga' => 120];
    $generos = ['estresado' => 18, 'triste' => 10749, 'feliz' => 35];
    
    $params = http_build_query([ 
        //construcción de la URL usando la API y la variable formData
        'api_key' => '0202074c6fd19918f230acfa46a461d5',
        'language' => 'es-ES',
        'include_adult' => false,
        'include_video' => false,
        'certification_country' => 'US',
        'certification' => $clasificacion,
        'sort_by' => 'popularity.desc',
        'with_runtime.gte' => $duracionMinima[$formData['duracion']],
        'with_genres' => $generos[$formData['sentimiento'][0]],
        'vote_count.gte' => 1000
    ]);
    
    $response = Http::get("https://api.themoviedb.org/3/discover/movie?$params");
    
    $response->assertOk();
}

};