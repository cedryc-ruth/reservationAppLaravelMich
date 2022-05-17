<?php

namespace Database\Seeders;

use App\Models\Show;
use App\Models\Type;
use App\Models\User;
use App\Models\Artist;
use App\Models\ArtistType;
use App\Models\Representation;
use Illuminate\Database\Seeder;
use Database\Seeders\LanguageSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtistSeeder::class);
        $this->call(TypeSeeder::class);

        foreach (Artist::all() as $artist) {
            $types = Type::inRandomOrder()->take(rand(1,3))->pluck('id');
            $artist->types()->attach($types);
            
        }

        $this->call(LocalitySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ShowSeeder::class);

        foreach (Show::all() as $show) {
            $artist_types = ArtistType::inRandomOrder()->take(rand(1,3))->pluck('id');
            $show->artist_types()->attach($artist_types);
        }

        $this->call(RepresentationSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(UserSeeder::class);


        foreach (User::all() as $user) {
            $representations = Representation::inRandomOrder()->take(rand(1,2))->pluck('id');
            $user->representations()->attach($representations,['places' => rand(1,4)]);

            
        }

        // $this->call(AdminSeeder::class);

    }
}
