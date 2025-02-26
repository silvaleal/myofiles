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
    public function definition(): array
    {
        return [
            "user_id"=>1,
            "category_id"=>1,
            "name"=>$this->faker->name,
            "slug"=>$this->faker->slug,
            "description"=>$this->faker->paragraph,
            "price"=>$this->faker->randomNumber(1,15),
        ];
    }
}
