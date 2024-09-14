<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    /**
     * A basic feature test example.
     */
    public function setup(): void
    {
        parent::setUp();
    }

    /** @test */
    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $credentials = [
            'email' => $user->email,
            'password' => 'password123',
        ];

        $response = $this->post('/login', $credentials);

        $response->assertRedirect('/items');

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        $credentials = [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ];

        $response = $this->post('/login', $credentials);

        $this->assertGuest();

        $response->assertSessionHasErrors(['email']);
    }
}
