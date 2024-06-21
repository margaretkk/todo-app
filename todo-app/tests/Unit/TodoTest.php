<?php

namespace Tests\Unit;

use App\Models\TodoModel;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_can_create_a_todo() 
    {
        $todo = TodoModel::factory([
            'name' => 'Test Name',
            'description' => 'Test Description',
        ])->create();

        $data = [
            'name' => 'Test Name',
            'description' => 'Test Description',
        ];

        $this->assertInstanceOf(TodoModel::class, $todo);
        $this->assertEquals($data['name'], $todo->name);
        $this->assertEquals($data['description'], $todo->description);
    }

    public function test_can_update_a_todo()
    {
        $todo = TodoModel::factory()->create();

        $data = [
            'name' => 'Updated Test Name',
            'description' => 'Updated Test Description',
        ];

        $updatedTodo = $todo->fill($data);
        $updatedTodo->save();

        $this->assertEquals($data['name'], $updatedTodo->name);
        $this->assertEquals($data['description'], $updatedTodo->description);
    }

    public function test_can_delete_todo()
    {
        $todo = TodoModel::factory()->create();

        $todo->delete();

        $this->assertDatabaseMissing('todo', ['id' => $todo->id]);
    }
}
