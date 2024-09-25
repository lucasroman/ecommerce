<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatTest extends TestCase
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

    // Users can upload files
    public function testUsersCanUploadFiles() : void 
    {
        Storage::fake('files');

        $file = UploadedFile::fake()->create('file.mp3');

        $response = $this->post('/service/chat', [
            'file' => $file,
        ]);

        Storage::disk('files')->assertExists($file->hasName());
    }
}
