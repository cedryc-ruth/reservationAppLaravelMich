<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $languages = Language::pluck('id');

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('habaligani'),
            'remember_token' => Str::random(10),
            'role_id'=>2,
            'language_id' => $this->faker->randomElement($languages),
        ];

        // return [
        //     'name' => 'Michaël Bat.',
        //     'email' => 'michael.batn@outlook.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('habaligani'),
        //     'remember_token' => Str::random(10),
        //     'role_id'=>1,
        //     'language_id' =>1,
        // ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
