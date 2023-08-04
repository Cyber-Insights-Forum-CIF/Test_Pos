<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voucher' => fake('name'),
            'phone' => fake()->phoneNumber(),
            'voucher_number' => fake()->randomNumber(),
            'total' => 0,
            'tax' => 10,
            'net_total' => 0,
            'user_id' => User::all()->random()->id,

        ];
    }
}
