<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langues = [
            ['language' => 'Français'],
            ['language' => 'Anglais'],
            ['language' => 'Espagnol'],
            ['language' => 'Néerlandais'],
            ['language' => 'Portugais'],
        ];

        Language::insert($langues);
    }
}
