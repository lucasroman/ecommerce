<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataTest extends TestCase
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

    // Form data route exist
    public function testRouteToFormDataSessionMustExist()
    {
        $response = $this->get('/');
        
        $response->assertViewIs('data');
    }
    
    /* 
    2. Check view data exist.
    3. Send data from data view. (post)
    4. Session name was saved.
    5. Data view show the new sesssion name (not null).
    6. Data view show notify message with empty session name.
    */
}
