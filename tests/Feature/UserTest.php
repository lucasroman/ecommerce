<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
