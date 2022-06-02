<?php

namespace App\Models;

use App\Models\Show;
use App\Models\Type;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'artist_type';



    /**
    * Get the shows of the performance (artist in a type of collaboration for a show)
    */


    public function shows()
    {
        return $this->belongsToMany(Show::class);
    }

    // Relations pour afficher les labels dans Voyager tcg

    public function artistId()
    {
        return $this->belongsToMany(Artist::class);
    }
    public function typeId()
    {
        return $this->belongsToMany(Type::class);
    }

    /**
     * Get the artist for that association.
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
    
    /**
     * Get the type for that association.
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
