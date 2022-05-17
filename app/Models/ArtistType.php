<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function shows()
    {
        return $this->belongsToMany(Show::class, 'artist_type_show', 'show_id', 'artist_types_id');
    }
    public function artistId()
    {
        return $this->belongsToMany(Artist::class); 
    }
    public function typeId()
    {
        return $this->belongsToMany(Type::class);

    }
}
