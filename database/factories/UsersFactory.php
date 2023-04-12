<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateString = fake()->date('Y-m-d');
        $date = Carbon::createFromFormat('Y-m-d', $dateString);
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt(Str::random(8)),
            'subscription_end_date' => $date,
        ];
    }
}
