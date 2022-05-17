<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Representation>
 */
class RepresentationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $shows = Show::pluck('id');
        $locations = Location::pluck('id');
        return [
            'when' => $this->faker->dateTime(),
            'show_id' => $this->faker->randomElement($shows),
            'location_id' => $this->faker->randomElement($locations),
        ];
    }
}
