<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $netto = $this->faker->numberBetween(10000, 30000);
        $price = $this->faker->numberBetween(1000, 3000);

        return [
            'netto' => $netto,
            'price' => $price,
            'amount' => $netto * $price
        ];
    }
}
