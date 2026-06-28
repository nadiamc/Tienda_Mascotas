<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'species' => fake()->randomElement(['Perro', 'Gato', 'Loro', 'Hamster', 'Conejo']),
            'age' => fake()->numberBetween(1, 15),
        ];
    }
}