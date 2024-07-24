<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate services table before fill it
        DB::table('services')->truncate();

        // Add default a service
        DB::table('services')->insert([
            'name' => 'Aprende a tocar el piano',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Service::factory()->count(4)->create();
    }
}