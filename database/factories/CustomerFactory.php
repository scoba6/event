<?php

namespace Database\Factories;

use App\Enums\Titre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titcli' => Titre::A,
            'nomcli' => fake()->name(),
            'maicli' => fake()->unique()->safeEmail(),
            'telcli' => fake()->e164PhoneNumber(),
            'adrcli' => fake()->address(),
        ];
    }
}
