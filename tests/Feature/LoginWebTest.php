<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginWebTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_form_is_accessible()
    {
        // Carga la página del formulario de inicio de sesión
        $response = $this->get('/login');

        // Verifica que la página se carga correctamente
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function user_can_login_with_valid_credentials()
    {
        // Crea un usuario en la base de datos
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Intenta iniciar sesión con las credenciales correctas
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        // Verifica que se redirige al dashboard
        $response->assertRedirect('/dashboard');

        // Verifica que el usuario está autenticado
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_invalid_credentials()
    {
        // Crea un usuario
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Intenta iniciar sesión con credenciales incorrectas
        $response = $this->from('/login')->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        // Verifica que no se redirige al dashboard
        $response->assertRedirect('/login');

        // Verifica que se muestran errores
        $response->assertSessionHasErrors(['email']);

        // Verifica que el usuario no está autenticado
        $this->assertGuest();
    }

    /** @test */
    public function user_can_logout_successfully()
    {
        // Crea un usuario y autentícalo
        $user = User::factory()->create();

        $this->actingAs($user);

        // Intenta cerrar sesión
        $response = $this->post('/logout');

        // Verifica que se redirige al login
        $response->assertRedirect('/login');

        // Verifica que el usuario no está autenticado
        $this->assertGuest();
    }
}

