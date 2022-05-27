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
        $types = [
            'auteur(e)',
            'chanteur',
            'chanteuse',
            'scénographe',
            'comédien',
            'comédienne',
            'producteur',
            'productrice',
            'régisseur',
            'régisseuse',
        ];

        foreach ($types as $type) {
            Type::create(['type' => $type]);
        }
    }
}
