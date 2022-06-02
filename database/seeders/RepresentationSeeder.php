<?php

namespace Database\Seeders;

use App\Models\Representation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Representation::factory(10)->create();

        $representations = [
            ['when' => '2022-05-14 20:00:00','show_id' => 8, 'location_id' => 1],
            ['when' => '2022-06-12 21:30:00','show_id' => 9, 'location_id' => 3],
            ['when' => '2022-06-18 19:00:00','show_id' => 10, 'location_id' => 5],
            ['when' => '2022-06-25 20:45:00','show_id' => 4, 'location_id' => 10],
            ['when' => '2022-06-15 21:00:00','show_id' => 6, 'location_id' => 3],
            ['when' => '2022-07-02 22:00:00','show_id' => 1, 'location_id' => 2],
            ['when' => '2022-06-23 21:15:00','show_id' => 8, 'location_id' => 9],
            ['when' => '2022-07-22 18:40:00','show_id' => 7, 'location_id' => 3],
            ['when' => '2022-06-16 19:00:00','show_id' => 5, 'location_id' => 7],
            ['when' => '2022-06-22 19:50:00','show_id' => 9, 'location_id' => 6],
            ['when' => '2022-06-13 20:30:00','show_id' => 2, 'location_id' => 8],
            ['when' => '2022-06-29 19:30:00','show_id' => 3, 'location_id' => 5],
        ];

        Representation::insert($representations);
    }
}
