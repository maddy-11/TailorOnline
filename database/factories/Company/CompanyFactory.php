<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory; 

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array = [1, 2, 3, 4, 5];
        return [
            'first_name'        => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'username'          => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
            'phone'             => fake()->phoneNumber,
            'dob'               => fake()->date,
            'created_by'        => Arr::random($array),
            'avatar'            => 'img/default-avatar.jpg',
            'gender'            => fake()->randomElement(['Male', 'Female']),
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
