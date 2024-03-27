<?php

namespace Tests\Unit\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user registration.
     *
     * @return void
     */
    public function test_register()
    {
        $userData = [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'password',
        ];

        $response = $this->postJson('/api/register', $userData);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'meta' => ['code', 'status', 'message'],
                'data' => [
                    'user' => ['id', 'name', 'email'],
                    'access_token' => ['token', 'type', 'expires_in'],
                ],
            ]);
    }

    /**
     * Test user login.
     *
     * @return void
     */
    public function test_login()
    {
        $user = User::factory()->create([
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $loginData = [
            'email' => 'user@gmail.com',
            'password' => 'password',
        ];

        $response = $this->postJson('/api/login', $loginData);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'meta' => ['code', 'status', 'message'],
                'data' => [
                    'user' => ['id', 'name', 'email'],
                    'access_token' => ['token', 'type', 'expires_in'],
                ],
            ]);
    }

    /**
     * Test user logout.
     *
     * @return void
     */
    public function test_logout()
    {
        $user = User::factory()->create();

        $token = $user->createToken('Test Token')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->postJson('/api/logout');

        $response->assertStatus(200)
            ->assertJson(['message' => 'Successfully logged out']);
    }
}
