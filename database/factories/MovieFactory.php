<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'premiere' => $this->faker->date(),
            'place' => $this->faker->city(),
            'desc' => $this->faker->paragraphs(),
        ];
    }
}
