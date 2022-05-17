<?php

namespace Database\Factories;

use App\Models\Locality;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $localities = Locality::pluck('id');
        $designation = $this->faker->company();
        return [
            'designation' => $designation,
            'slug' => Str::slug($designation,'-'),
            'address' => $this->faker->address(),
            'website' => $this->faker->domainName(),
            'phone' => $this->faker->phoneNumber(),
            'locality_id' => $this->faker->randomElement($localities),
            
        ];
    }
}
