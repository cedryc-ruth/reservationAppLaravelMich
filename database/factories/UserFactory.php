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
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();

        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'login' => 'My Login',
            'name' => $firstname.' '.$lastname,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('habaligani'),
            'remember_token' => Str::random(10),
            'role_id'=>null,
            'language_id' => $this->faker->randomElement($languages),
        ];

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
