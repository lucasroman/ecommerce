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
            'description' => 'Te traigo un gran curso de piano, tanto por su contenido como por su forma. He llevado especial cuidado en la claridad y el dinamismo de las lecciones, en que el resultado sea profesional, y donde condenso toda mi experiencia, tanto como músico de directo, como también en lo que se refiere a la docencia.


En lo que se refiere al contenido online, me parece indispensable la calidad de imagen y sonido, así como también la progresión didáctica que siguen los contenidos, en la consecución de unos objetivos claros para el alumno. ',
            'image' => 'services/piano.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Service::factory()->count(4)->create();
    }
}
