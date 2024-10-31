<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        // Fake folder where upload files
        Storage::fake('files');

        // Create an example file
        $file = UploadedFile::fake()->create('file.mp3');
        
        // Send file from chat 
        $this->post('/service/chat', [
            'serviceId' => 1,
            'owner' => 1,
            'guest' => 2,
            'speaker' => 2,
            'attachFile' => $file,
        ]);
        
        // Check that file exist
        // storage_path return: 'D:\laragon\www\ecommerce\storage'
        $this->assertFileExists(storage_path('app/files/') . $file->hashName());
    }
}
