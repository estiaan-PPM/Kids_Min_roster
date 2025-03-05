<?php

namespace Database\Factories;

use App\Models\Guardians;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kid>
 */
class KidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'guardians_id' => Guardians::factory(),
            'age' => fake()->numberBetween(3, 13),
            'allergies' => fake()->randomElement([
                'Peanuts',
                'Shellfish',
                'Pollen',
                'Dust mites',
                'Dairy',
                'Gluten',
                'Eggs',
                'Soy',
                'Tree nuts',
                'Latex',
                'None'
            ]),
        ];
    }
}
