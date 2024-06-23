<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_register_a_user()
    {
        $userData = [
            'name' => 'Test User',
            'login' => 'testuser',
            'password' => 'password',
        ];

        $response = $this->postJson('/api/registration', $userData);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'user_role',
                     'token',
                     'status',
                 ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'login' => 'testuser',
            'role' => 'user',
        ]);
    }

    /** @test */
    public function it_returns_error_when_registering_with_existing_login()
    {
        $existingUser = User::factory()->create();

        $userData = [
            'name' => 'Test User',
            'login' => $existingUser->login,
            'password' => 'password',
        ];

        $response = $this->postJson('/api/registration', $userData);

        $response->assertStatus(422)
                 ->assertJson([
                     'message' => 'Пользователь с таким логином уже существует',
                 ]);
    }
}
