<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    
    public function testShowAllTasks()
    {
        $response = $this->get('/api/tasks');

        $response->assertStatus(200);
    }

    public function testshowTask()
    {
        $task = factory(\App\Task::class)->create();
        $response = $this->get('/api/task/'.$task->id);

        $response->assertStatus(200);
    }

    public function testSaveTask()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->json('POST', '/api/task', [
                'section_id' => 1,
                'title' => 'Task 1', 
                'description' => 'description']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => "Task successfully created.",
            ]);
    }

    public function testUpdateTask()
    {
        $task = factory(\App\Task::class)->create();
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->json('PATCH', '/api/task/'.$task->id, ['name' => 'Task update']);

        $response
            ->assertStatus(202)
            ->assertJson([
                'message' => "Task successfully updated.",
            ]);
    }

    public function testDeleteTask()
    {
        $task = factory(\App\Task::class)->create();
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->json("DELETE", '/api/task/'.$task->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "Task successfully deleted.",
            ]);
    }
}
