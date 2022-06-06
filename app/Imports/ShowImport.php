<?php

namespace App\Imports;

use App\Models\Show;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ShowImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Show([
             'title' => $row['title'],
             'slug' => $row['slug'],
             'summary' => $row['summary'],
             'poster_url' => $row['poster_url'],
             'images' => $row['images'],
             'bookable' => $row['bookable'],
             'price' => $row['price'],
             'description' => $row['description'],
             'location_id' => $row['location_id'], 
        ]);
    }
}
