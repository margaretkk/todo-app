<?php

namespace Tests\Feature;

use App\Models\TodoModel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function test_can_update_todo()
    {
        $data = [
            'name' => 'Test Name New',
            'description' => 'Test Description',
        ];

        $response = $this->post('/store-data', $data);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        
    }

    public function test_can_show_todo()
    {
        $todo = TodoModel::factory()->create();

        $response = $this->get("/details/{$todo->id}");
        $response->assertStatus(200);
    }
}
