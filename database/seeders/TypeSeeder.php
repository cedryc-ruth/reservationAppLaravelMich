<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['acteur','actrice','chanteur','chanteuse','instrumentaliste','metteur en scène'];

        foreach ($types as $type) {
            Type::create(['type' => $type]);
        }
    }
}
