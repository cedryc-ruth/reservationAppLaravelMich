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
    
    
    public function artist_types()
    {
        return $this->belongsToMany(ArtistType::class, 'artist_type_show', 'show_id', 'artist_types_id');
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}
