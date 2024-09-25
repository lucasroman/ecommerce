<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
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

    public function testListOfServicesShowsAllKindOfServices(): void 
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/serviceslist');

        $response->assertSeeText('My services');

        $response->assertSeeText('Community services');
    }
}
