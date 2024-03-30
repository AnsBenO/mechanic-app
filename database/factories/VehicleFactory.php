<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'fuelType' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Electric']),
            'registration' => $this->faker->unique()->regexify('[A-Za-z0-9]{6}'),
            'photos' => null,
            'clientID' => Client::factory()->create()->id,
        ];
    }
}
