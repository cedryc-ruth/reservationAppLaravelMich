<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistTypeShow extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'artist_type_show';
}
