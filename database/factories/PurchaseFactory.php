<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $bruto = $this->faker->numberBetween(1000, 5000);
        $netto = floor($bruto - ($bruto * 0.06));
        $price = $this->faker->numberBetween(1000, 3000);

        return [
            'name' => $this->faker->firstName(),
            'bruto' => $bruto,
            'netto' => $netto,
            'price' => $price,
            'amount' => $netto * $price
        ];
    }
}
