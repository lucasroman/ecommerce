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
        $this->post('/tasks', [
            'title' => 'Title for new task test',
            'description' => 'Description for new task test.',
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Title for new task test',
            'description' => 'Description for new task test.',
        ]);
    }

    // Task - Can't save task without title
    public function testCantSaveATaskWithoutTitle()
    {
        $this->post('/tasks', [
            'title' => '', 
            'description' => 'Description of a task.', 
        ]);

        $this->assertDatabaseMissing('tasks', ['title' => '']);
    }

    // Task - Can't save task without description
    public function testCantSaveATaskWithoutDescription()
    {
        $this->post('/tasks', [
            'title' => 'Task title',
            'description' => '',
        ]);

        $this->assertDatabaseMissing('tasks', ['description' => '' ]);
    }

    // Task - Should show all task in database
    public function testShouldSeeAllTasks()
    {
        $this->task->save();
        
        $response = $this->get('/tasks');

        $response->assertSee($this->task->title);
    }

    // Task - Should edit a task
    public function testShouldEditATask()
    {
        // Save current defatult task
        $this->task->save();

        // Check for current task title
        $response = $this->get(route('tasks.index'));

        $response->assertSeeText('Task title');
        
        // Send updated data to TaskController
        $this->patch(route('tasks.update', $this->task), [
            'done' => 1,
            'title' => 'Updated task title',
            'description' => 'Updated description task.',
        ])->assertRedirect(route('tasks.index'));

        // Check for current task title
        $response = $this->get(route('tasks.index'));

        $response->assertSeeText('Updated task title');
    }

    // Task - Should delete a task
    public function testShouldDeleteATask()
    {
        // Save current default task
        $this->task->save();

        // Check task was saved
        $this->assertDatabaseHas('tasks', $this->task->toArray());

        // Delete task
        $response = $this->delete('tasks/' . $this->task->id);

        // Check task doesn't exist
        $this->assertDatabaseMissing('tasks', $this->task->toArray());

        $response->assertRedirect(route('tasks.index'));
    }
}

    /*
    ? Input and save a task
    
    -1. Form route must exist.
    -2. Form view must exist.
    -3. Can save a task.
    -4. Can't save a task with any empty field.
    -5. Can show all tasks.
    -6. Can update task.
    -7. Can delete a task
    -Refactor test and controller

    */
