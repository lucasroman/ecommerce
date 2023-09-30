<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

/* You can truncate tables in two ways:
1. Use query builder:
    use Illuminate\Support\Facades\DB; <-- You need add DB facade
    DB::table('users')->truncate();

2. Use model of table to truncate:
    use App\Models\User; <-- You need add the model!
    User::truncate();
 */

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
            'email' => 'jdoe@example.com', 
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
            'avatar' => 'No image file',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
