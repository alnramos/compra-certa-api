<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstablishmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'country' => $this->faker->country(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'address' => $this->faker->streetAddress(),
            'neighborhood' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'postcode' => $this->faker->postcode(),
        ];
    }
}
