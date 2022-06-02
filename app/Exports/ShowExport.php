<?php

namespace App\Exports;

use App\Models\Show;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ShowExport implements FromCollection,WithHeadings
{
    public function headings():array  // Fonction qui va retourner les titres de notre tableau Excel/CSS
    {
        return [
            'Id',
            'Title',
            'slug',
            'Subtitle',
            'poster_url',
            'images',
            'Bookable',
            'Price',
            'Description',
            'Location_id'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Show::getShow());  
    }
}
