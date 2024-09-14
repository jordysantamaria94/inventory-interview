<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setup(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_create_an_item()
    {
        $data = [
            'nombre' => 'Test',
            'descripcion' => 'Descripción',
            'cantidad' => 10,
            'precio' => 99.99,
            'user_id' => $this->user->id
        ];

        $response = $this->actingAs($this->user)->post('/items', $data);

        $response->assertRedirect('/items');

        $this->assertDatabaseHas('items', [
            'nombre' => 'Test',
            'descripcion' => 'Descripción',
            'cantidad' => 10,
            'precio' => 99.99,
            'user_id' => $this->user->id
        ]);
    }
}
