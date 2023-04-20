<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    // Task - Route to form
    public function testFormTaskMustExist()
    {
        $response = $this->get('/tasks/create');

        $response->assertOk();
    }

    // Task - View create
    public function testFormTaskViewMustExist()
    {
        $response = $this->get('/tasks/create');

        $response->assertViewIs('tasks.create');
    }
    
    // Task - Save task
    public function testShouldCanSaveANewTask()
    {
        $response = $this->post('/tasks', [
            'title' => 'Task title', 
            'description' => 'Description of a task.', 
        ]);

        $this->assertDatabaseCount('tasks', 1);        
    }
}

    /*
    Input and save a task
    
    -1. Form route must exist.
    -2. Form view must exist.
    3. Can save a task.
    4. Can't save a empty task.
    5. Can show all tasks.
    6. Can update task.

    */
