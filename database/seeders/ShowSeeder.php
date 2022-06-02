<?php

namespace Database\Seeders;

use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Show::factory(10)->create();

        $shows = [
            ['title' => 'Splendeurs et misères des courtisanes','slug' => 'splendeurs-et-miseres-des-courtisanes',
             'summary' => 'Moeurs et intringues de la bourgeoisie du 19ème siècle', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 21.00, 'description' => null, 'location_id' => 9,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'La doublure','slug' => 'la-doublure',
             'summary' => 'Plongez dans les moindres recoins de la personnalité', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 18.00, 'description' => null, 'location_id' => 4,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Le malade imaginaire','slug' => 'le-malade-imaginaire',
             'summary' => 'La célèbre pièce de Molière revisitée', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 23.00, 'description' => null, 'location_id' =>10,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Hamlet','slug' => 'hamlet',
             'summary' => 'Le drame shakespearien joué par la petite troupe du Midi', 'poster_url' =>null,
             'images' => null, 'bookable' => 0, 'price' => 17.00, 'description' => null, 'location_id' => 8,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Le Cercle','slug' => 'le-cercle',
             'summary' => 'Mystères et aventures dans un espace lointain', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 26.00, 'description' => null, 'location_id' => 7,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Les frères Karamazov','slug' => 'les-freres-karamazov',
             'summary' => 'Drame spirituel et interrogations philosophiques de Fiodor Dostoïevski', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 22.00, 'description' => null, 'location_id' => 6,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'The voices','slug' => 'the-voices',
             'summary' => 'La comédie musicale à grand succès est de retour!', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 19.00, 'description' => null, 'location_id' => 5,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'La geïsha','slug' => 'la-geisha',
             'summary' => 'Souvenirs d\'une geïsha dans l\'ancien Japon féodal.', 'poster_url' =>null,
             'images' => null, 'bookable' => 1, 'price' => 20.00, 'description' => null, 'location_id' => 1,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'La reine Margot','slug' => 'la-reine-margot',
             'summary' => 'L\'adaptation du roman de Balzac au théâtre', 'poster_url' =>null,
             'images' => null, 'bookable' => 0, 'price' => 24.00, 'description' => null, 'location_id' => 3,
             'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Angkor','slug' => 'angkor',
             'summary' => 'Le mythe fondateur de l\'empire Khmer', 'poster_url' =>null,
             'images' => null, 'bookable' => 0, 'price' => 30.00, 'description' => null, 'location_id' => 1,
             'created_at' => now(), 'updated_at' => now()],
        ];

        Show::insert($shows);

    }
}
