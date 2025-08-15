<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\kpi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kpi>
 */
class KpiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kpi_name' => $this->faker->randomElement(['Throughput', 'Payload', 'PDP', 'GGSN']),
            'site_id' => 'SITE' . $this->faker->numberBetween(1, 50),
            'value' => $this->faker->randomFloat(2, 0, 1000),
            'date' => $this->faker->date(),
            //
        ];
    }
}
