<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'cpf' => fake()->unique()->randomNumber(9) . '12',
            'rg' => (string)fake()->randomNumber(9),
            'birthday' => fake()->dateTime(),
            'gender' => fake()->boolean() ? 'm' : 'f',
            'cell_phone' => '11' . fake()->randomNumber(9),
            'email' => fake()->email(),
            'description' => fake()->text(),
        ];
    }
}
