<?php

namespace App\Models;

use App\Models\ArtistType;
use App\Models\Representation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Show extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'shows';


    // Voyager relationship

    public function locationId()
    {
        return $this->belongsTo(Location::class);  // Un "show" se déroule dans une et une seule location
    }

    // Get show location
    
    public function location()
    {
        return $this->belongsTo(Location::class);  // Un "show" se déroule dans une et une seule location
    }
    
    /**
     * Get the performances (artists in a type of collaboration) for the show
     */

    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class);
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}
