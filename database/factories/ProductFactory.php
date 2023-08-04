<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
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
        $unit = ['mol','kg','cd'];
        return [
            'name' => fake('name'),
            'branch_id' => brand::all()->random()->id,
            'actual_price' => rand(200,1000),
            'sale_price' => rand(10,30),
            'total_stock' => rand(10,20),
            'unit' => $unit[rand(1,5)],
            'more_information' => fake()->text(),
            'user_id' => User::all()->random()->id,
            'photos' => config('info.default_main_photo')
        ];
    }
}
