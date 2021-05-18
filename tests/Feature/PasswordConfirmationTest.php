<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    /** @test */
    public function confirmPasswordScreenCanBeRendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');

        $response->assertStatus(200);
    }

    /** @test */
    public function passwordCanBeConfirmed()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    /** @test */
    public function passwordIsNotConfirmedWithInvalidPassword()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
