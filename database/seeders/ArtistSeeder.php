<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Artist::factory(10)->create();

        $artists = [
            ['firstname' => 'Felix','lastname'=>'Tran','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Laura','lastname'=>'Samatta','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Pauline','lastname'=>'Van Aerts','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Gaston','lastname'=>'Meilleur','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Palma','lastname'=>'Rodriguez','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Kevin','lastname'=>'Mertens','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Maude','lastname'=>'Voisin','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Monica','lastname'=>'Havell','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Mohammed','lastname'=>'Lamine','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
            ['firstname' => 'Sameera','lastname'=>'Khan','image'=>'https://i.pravatar.cc/300?u=fake@pravatar.com','bio' =>null],
        ];

        Artist::insert($artists);
    }
}
