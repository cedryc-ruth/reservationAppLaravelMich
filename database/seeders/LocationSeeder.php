<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['designation' => 'Théâtre Marni', 'slug' => 'theatre-marni',
            'address' => '25 Rue de Vergnies','website' => 'https://www.theatremarni.com',
            'phone' =>'02 639 09 82','image' => 'https://picsum.photos/500/350','locality_id' => 3],

            ['designation' => 'Théâtre Varia', 'slug' => 'theatre-varia',
            'address' => '78 rue du Sceptre','website' => 'https://www.varia.be',
            'phone' =>'02 640 82 58','image' => 'https://picsum.photos/500/350','locality_id' => 3],

            ['designation' => 'Théâtre l\'Improviste', 'slug' => 'theatre-l-improviste',
            'address' => '120 rue de Fierlant','website' => 'https://www.improviste.be',
            'phone' =>'02 681 09 01','image' => 'https://picsum.photos/500/350','locality_id' => 2],

            ['designation' => 'Théâtre Le Public', 'slug' => 'theatre-le-public',
            'address' => '64-70 rue Braemt','website' => 'http://www.theatrelepublic.be',
            'phone' =>'0800 944 44','image' => 'https://picsum.photos/500/350','locality_id' => 5],

            ['designation' => 'Centre Culturel Jacques Franck', 'slug' => 'centre-culturel-jacques-franck',
            'address' => '94 Chaussée de Waterloo','website' => 'https://lejacquesfranck.be',
            'phone' =>'02 538 90 20','image' => 'https://picsum.photos/500/350','locality_id' => 4],

            ['designation' => 'L\'Os à Moelle', 'slug' => 'l-os-a-moelle',
            'address' => '153 Avenue Emile Max','website' => 'https://www.osamoelle.be',
            'phone' =>'0475 71 55 97','image' => 'https://picsum.photos/500/350','locality_id' => 6],

            ['designation' => 'Comédie Royale Claude Volter', 'slug' => 'comedie-royale-claude-volter',
            'address' => '98 Avenue des Frères Legrain','website' => 'https://www.comedievolter.be',
            'phone' =>'02 762 09 63','image' => 'https://picsum.photos/500/350','locality_id' => 7],

            ['designation' => 'Le Café de la Rue', 'slug' => 'le-cafe-de-la-rue',
            'address' => '30 Rue de la Colonne','website' => 'https://lecafedelarue.be',
            'phone' =>'0473.50.58.75','image' => 'https://picsum.photos/500/350','locality_id' => 10],

            ['designation' => 'Le Botanique', 'slug' => 'le-botanique',
            'address' => '236 Rue Royale','website' => 'https://www.botanique.be',
            'phone' =>'02 218 37 32','image' => 'https://picsum.photos/500/350','locality_id' => 5],

            ['designation' => 'CCU – Centre culturel d’Uccle', 'slug' => 'centre-culturel-uccle',
            'address' => '47 Rue Rouge','website' => 'https://www.ccu.be/',
            'phone' =>'02.374.04.95','image' => 'https://picsum.photos/500/350','locality_id' => 9],
        ];

        Location::insert($locations);
    }
}
