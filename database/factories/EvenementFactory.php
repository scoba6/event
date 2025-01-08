<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Prestation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->unique()->random()->id,
            'libevn' => fake()->sentence(),
            'desevn' => fake()->text(),
            'strevn' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'endevn' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'typevn' => Prestation::all()->unique()->random()->id,
        ];
    }
}
