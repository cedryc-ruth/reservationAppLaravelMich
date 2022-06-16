<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder  // Examen : Le Seeder du modèle Room
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            ['name' => 'Salle A', 'seats' => 100 , 'location_id' => 1],
            ['name' => 'Salle B', 'seats' => 80 , 'location_id' => 1],
            ['name' => 'Salle A', 'seats' => 50 , 'location_id' => 2],
            ['name' => 'Salle B ', 'seats' => 90 , 'location_id' => 2],
            ['name' => 'Salle C ', 'seats' => 120 , 'location_id' => 2],
            ['name' => 'Salle A ', 'seats' => 200 , 'location_id' => 3],
            ['name' => 'Salle B ', 'seats' => 250 , 'location_id' => 3],
            ['name' => 'Salle C ', 'seats' => 300 , 'location_id' => 3],
            ['name' => 'Salle A ', 'seats' => 130 , 'location_id' => 4],
            ['name' => 'Salle B ', 'seats' => 160 , 'location_id' => 4],
            ['name' => 'Salle C ', 'seats' => 190 , 'location_id' => 4],
            
        ];

        Room::insert($rooms);
    }
}
