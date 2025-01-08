<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotesse>
 */
class HotesseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomhot' => $this->faker->name(),
            'telhot' => $this->faker->phoneNumber,
            'maihot' => $this->faker->safeEmail,
            'adrhot' => $this->faker->address,
            'deshot' => $this->faker->text,
        ];
    }
}
