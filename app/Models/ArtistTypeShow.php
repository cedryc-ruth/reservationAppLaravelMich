<?php

namespace App\Models;

use App\Models\Show;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistTypeShow extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'artist_type_show';


    public function showId()
    {
        return $this->belongsToMany(Show::class);
    }

}
