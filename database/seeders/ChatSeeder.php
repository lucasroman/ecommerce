<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tuncate chats table
        Chat::truncate();

        Chat::create([
            'service_id' => 1,
            'owner' => 1,
            'guest' => 2,
            'message' => "Hi I'm Jhon",
            'speaker' => 1, // 0 = Speak Onwer | 1 = Speak Guest
        ]);

        Chat::create([
            'service_id' => 1,
            'owner' => 1,
            'guest' => 2,
            'message' => "Hi Jhon, I'm Luke. Do you want learn to play piano?",
            'speaker' => 0, // 0 = Speak Onwer | 1 = Speak Guest
        ]);

        Chat::create([
            'service_id' => 1,
            'owner' => 1,
            'guest' => 3,
            'message' => "My name is Maria. How much for piano lessons?",
            'speaker' => 1, // 0 = Speak Onwer | 1 = Speak Guest
        ]);
    }
}
