<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // User instantiated but not saved in the database
        $this->user = User::create([
            'name' => 'Jhon Doe', 
            'alias' => 'The Doe', 
            'avatar' => 'storage/exampleImage.jpg', 
        ]);
    }
    
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

    // Users have a route and view
    public function testUsersResourceExist()
    {
        $response = $this->get('/users');

        // Check users route exist
        $response->assertStatus(200);

        // Check users view exist
        $response->assertViewIs('users.index');
    }

    // Users view show all users in database
    public function testUsersIndexShowAllUsersInDatabase()
    {
        $response = $this->get('/users');

        // Check all user data is showed in index view
        $response->assertSee('Jhon Doe')
            ->assertSee('The Doe')
            ->assertSee('storage/exampleImage.jpg');
    }

    // Create user view exist
    public function testCreateUserViewMustExist()
    {
        $response = $this->get('/users/create');

        $response->assertStatus(200);
    }

    /**
     *  IMPORTANT: the require "php-gd" extension is required installed 
     *  to test work.
     * */ 
    // New user send valid data
    public function testCreateUserSendValidData()
    {
        // Create a fake avatar image of 200x200 pixels
        
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg', 200, 200);

        // Post valid data
        
        $response = $this->post('/users', [
            'name' => 'Example name', 
            'alias' => 'Example alias',     
            'avatar' => $file, 
        ]);

        // Get id of user newly created (above)

        $newUser = User::all()->last();
     
        // Check redirect to show view of new user (this count like 2 asserts)

        $response->assertRedirect('/users/'. $newUser->id);

        // Check that new user exists in database
        
        $this->assertModelExists($newUser);
    }

    // 2. Edit
    // 3. Show
}
