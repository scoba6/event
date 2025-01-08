<?php

namespace Database\Factories;

use App\Enums\Classification;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evenement_id' => Evenement::all()->unique()->random()->id,
            'namtab' => $this->faker->word(),
            'numtab' => $this->faker->randomNumber(2),
            'clainv' => $this->faker->randomElement(Classification::cases()),
        ];
    }
}
