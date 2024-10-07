<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void 
    {
        parent::setUp();

        $this->user1 = User::create([
           'name' => 'Test name',
           'email' => 'test@eamil.com',
           'password' => 'myPass',
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

    // Users can upload files
    public function testUsersCanUploadFiles() : void 
    {
        Storage::fake('uploads');

        $file = UploadedFile::fake()->create('file.mp3');

        $this->post('/service/chat', [
            'file' => $file,
        ]);

        Storage::disk('uploads')->assertExists($file->hasName());
    }
}
