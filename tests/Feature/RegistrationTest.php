<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registrationScreenCanBeRendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function newUsersCanRegister()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0831234567',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
        $response->assertRedirect(route('account.inactive'));
    }

    /** @test */
    public function userCanNotRegisterWithEmailThatAlreadyExists()
    {
        User::factory()->create(['email' => 'test@example.com']);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0831234567',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
        $this->assertDatabaseCount('users', 1);
        $response->assertSessionHasErrors(['email' => 'The email has already been taken.']);
    }
}
