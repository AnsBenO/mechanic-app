<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repair>
 */
class RepairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']),
            'startDate' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'endDate' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'mechanicNotes' => $this->faker->paragraph,
            'clientNotes' => $this->faker->paragraph,
            'mechanicID' => User::factory()->create(['role' => 'admin'])->id,
            'vehicleID' => Vehicle::factory()->create()->id,
        ];
    }
}
