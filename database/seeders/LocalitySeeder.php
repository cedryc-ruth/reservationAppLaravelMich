<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localities = [
            ['postal_code' => '1070', 'locality' => 'Anderlecht'],
            ['postal_code' => '1190', 'locality' => 'Forest'],
            ['postal_code' => '1050', 'locality' => 'Ixelles'],
            ['postal_code' => '1060', 'locality' => 'Saint-Gilles'],
            ['postal_code' => '1210', 'locality' => 'St Josse-ten-Noode'],
            ['postal_code' => '1030', 'locality' => 'Schaerbeek'],
            ['postal_code' => '1150', 'locality' => 'Woluwé-St-Pierre'],
            ['postal_code' => '1000', 'locality' => 'Bruxelles-Ville'],
            ['postal_code' => '1180', 'locality' => 'Uccle'],
            ['postal_code' => '1080', 'locality' => 'Molenbeek'],
        ];

        Locality::insert($localities);
    }
}
