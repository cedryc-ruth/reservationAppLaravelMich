<?php

namespace Database\Seeders;

use App\Models\ArtistType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artistType =  [
            ['artist_id' => 1 , 'type_id' => 1],
            ['artist_id' => 1 , 'type_id' => 2],
            ['artist_id' => 1 , 'type_id' => 4],
            ['artist_id' => 1 , 'type_id' => 5],
            ['artist_id' => 2 , 'type_id' => 8],
            ['artist_id' => 2 , 'type_id' => 10],
            ['artist_id' => 2 , 'type_id' => 6],
            ['artist_id' => 2 , 'type_id' => 3],
            ['artist_id' => 3 , 'type_id' => 8],
            ['artist_id' => 3 , 'type_id' => 6],
            ['artist_id' => 3 , 'type_id' => 3],
            ['artist_id' => 4 , 'type_id' => 7],
            ['artist_id' => 4 , 'type_id' => 7],
            ['artist_id' => 4 , 'type_id' => 4],
            ['artist_id' => 4 , 'type_id' => 5],
            ['artist_id' => 5 , 'type_id' => 6],
            ['artist_id' => 5 , 'type_id' => 8],
            ['artist_id' => 5 , 'type_id' => 3],
            ['artist_id' => 6 , 'type_id' => 1],
            ['artist_id' => 6 , 'type_id' => 7],
            ['artist_id' => 6 , 'type_id' => 5],
            ['artist_id' => 7 , 'type_id' => 10],
            ['artist_id' => 7 , 'type_id' => 6],
            ['artist_id' => 7 , 'type_id' => 3],
            ['artist_id' => 7 , 'type_id' => 4],
            ['artist_id' => 8 , 'type_id' => 3],
            ['artist_id' => 8 , 'type_id' => 6],
            ['artist_id' => 8 , 'type_id' => 8],
            ['artist_id' => 8 , 'type_id' => 10],
            ['artist_id' => 9 , 'type_id' => 4],
            ['artist_id' => 9 , 'type_id' => 5],
            ['artist_id' => 9 , 'type_id' => 2],
            ['artist_id' => 10 , 'type_id' => 6],
            ['artist_id' => 10 , 'type_id' => 1],
            ['artist_id' => 10 , 'type_id' => 3],
            ['artist_id' => 10 , 'type_id' => 8],
           
        ];

        ArtistType::insert($artistType);
    }
}
