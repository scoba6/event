<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\Evenement;
use App\Enums\Classification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invite>
 */
class InviteFactory extends Factory
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
            'table_id' => Table::all()->unique()->random()->id,
            'naminv' => $this->faker->name(),
            'clainv' => $this->faker->randomElement(Classification::cases()),
            'preinv' => $this->faker->boolean(),
        ];
    }
}
