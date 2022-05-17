<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $locations = Location::pluck('id');
        $title = $this->faker->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title,'-'),
            'subtitle' => $this->faker->sentence(6),
            'poster_url' => 'https://picsum.photos/200/250',
            'location_id' => $this->faker->randomElement($locations),
            'bookable' => '1',
            'description' => $this->faker->text($maxNbChars = 2000),
            'price' => $this->faker->randomFloat($nbMaxDecimals=2, $min=10, $max=100),
        ];
    }
}
