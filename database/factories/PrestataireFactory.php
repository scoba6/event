<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestataire>
 */
class PrestataireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nompre' => $this->faker->name(),
            'telpre' => $this->faker->phoneNumber,
            'maipre' => $this->faker->safeEmail,
            'adrpre' => $this->faker->address,
            'despre' => $this->faker->text,
        ];
    }
}
