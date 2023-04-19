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
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /*
    Input and save a task
    
    -1. Form route must exist.
    *2. Form view must exist.
    3. Can save a task.
    4. Can't save a empty task.
    5. Can show all tasks.
    6. Can update task.

    */

    // Form for create a new task
    public function testFormTaskMustExist()
    {
        $response = $this->get('/tasks/create');

        $response->assertOk();
    }

    // Form task have a view
    public function testFormTaskViewMustExist()
    {
        $response = $this->get('/tasks/create');

        $response->assertViewIs('tasks.create');
    }
    
}
