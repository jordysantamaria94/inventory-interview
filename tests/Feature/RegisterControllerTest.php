<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_item()
    {
        $data = [
            'name' => 'Test',
            'email' => 'test@email.com',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ];

        $response = $this->post('/register', $data);

        $response->assertRedirect('/items');

        $this->assertDatabaseHas('users', [
            'name' => 'Test',
            'email' => 'test@email.com',
        ]);

        $this->assertAuthenticated();
    }
}
