<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->task = Task::make([
            'title' => 'Task title', 
            'description' => 'A description of task.', 
        ]);
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
        $this->assertDatabaseCount('tasks', 0);        

        $response = $this->post('/tasks', [
            'title' => 'Task title',
            'description' => 'Description of a task.',
        ]);

        $this->assertDatabaseCount('tasks', 1);        
    }

    // Task - Can't save task without title
    public function testCantSaveATaskWithoutTitle()
    {
        $this->assertDatabaseCount('tasks', 0);

        $response = $this->post('/tasks', [
            'title' => '', 
            'description' => 'Description of a task.', 
        ]);

        $this->assertDatabaseCount('tasks', 0);
    }

    // Task - Can't save task without description
    public function testCantSaveATaskWithoutDescription()
    {
        $this->assertDatabaseCount('tasks', 0);

        $response = $this->post('/tasks', [
            'title' => 'Task title',
            'description' => '',
        ]);

        $this->assertDatabaseCount('tasks', 0);
    }

    public function testShouldSeeAllTasks()
    {
        $this->task->save();
        
        $response = $this->get('/tasks');

        $response->assertSee($this->task->title);
    }
}


    /*
    ? Input and save a task
    
    -1. Form route must exist.
    -2. Form view must exist.
    -3. Can save a task.
    - 4. Can't save a task with any empty field.
    *5. Can show all tasks.
    6. Can update task.

    */
