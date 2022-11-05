<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "product_name" => fake()->sentence(),
            "product_price" => fake()->randomFloat(2, 10, 30),
            "product_quantity" => fake()->randomNumber(3, false),
            "product_sell" => fake()->randomNumber(3, false),
            "product_sales" => fake()->randomNumber(3, false),
            "created_at" => fake()->date() . " " . fake()->time(),
            "updated_at" => fake()->date() . " " . fake()->time()
        ];
    }
}
