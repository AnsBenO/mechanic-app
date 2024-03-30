<?php

namespace Database\Factories;

use App\Models\Repair;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //  'repairID', 'additionalCharges', 'totalAmount'

    public function definition(): array
    {
        return [
            'repairID' => Repair::factory()->create()->id,
            'additionalCharges' => $this->faker->randomFloat(2, 0, 1000),
            'totalAmount' => $this->faker->randomFloat(2, 0, 10000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
