<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardians>
 */
class GuardiansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_1' => fake()->firstName(),
            'name_2' => fake()->firstName(),
            'cellphone_number' => fake()->phoneNumber(),
        ];
    }
}
