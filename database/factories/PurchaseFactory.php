<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_product' => $this->faker->numberBetween(1, 3),
            'id_establishment' => $this->faker->numberBetween(1, 10),
            'id_user' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'purchased_at' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
