<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_login()
    {
        $user = User::factory()->create([
            'login' => 'test',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->post('/api/login', [
            'login' => 'test',
            'password' => 'secret',
        ]);

        $response->assertStatus(200);
        $this->assertAuthenticated();
    }
}
