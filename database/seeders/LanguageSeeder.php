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
        $langues = ['Français','English','Nederlands'];

        foreach ($langues as $langue) {
            Language::create([
                'language' => $langue]);
        };
    }
}
