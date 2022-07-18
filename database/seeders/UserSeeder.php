<?php

namespace Database\Seeders;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Truncate table before to seed
DB::table('users')->truncate();

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe', 
            'alias' => 'Fulgore', 
            'avatar' => 'No image file',
        ]);
    }
}
