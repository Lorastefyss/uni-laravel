<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'year' => $this->faker->numberBetween(1971, now()->year),
            'type' => $this->faker->randomElement(['Conference', 'Seminar', 'Workshop', 'Symposium']),
        ];
    }
}
