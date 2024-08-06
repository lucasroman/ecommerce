<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Fake service can belongs to user id 1 or 2
            'user_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->sentence(5),
            'description' => $this->faker->text(200),
            'image' => 'https://picsum.photos/300/200',
        ];
    }
}
