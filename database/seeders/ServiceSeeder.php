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
            'user_id' => 1,
            'name' => 'Aprende a tocar el piano',
            'description' => 'Praesent fermentum mattis nulla, nec maximus eros mattis in. Sed sodales, justo in pretium lacinia, lectus nisl molestie tellus, ac viverra eros velit nec nisl. Sed pellentesque in nunc at feugiat. Phasellus elementum pretium lacinia. Cras gravida sodales porta. Pellentesque pellentesque semper elementum. Curabitur dignissim sapien augue, in blandit nisi mollis eu. Morbi faucibus dui in lacus vehicula elementum. Mauris felis massa, congue ut dui sed, molestie aliquet urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam auctor leo vitae interdum ultricies. Phasellus mattis porttitor diam. Praesent et tempus massa. Nunc elementum erat quis dolor blandit, id egestas quam volutpat. ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Service::factory()->count(4)->create();
    }
}
