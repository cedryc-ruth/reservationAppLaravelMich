<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Show;
use App\Models\Locality;
use App\Models\Representation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'locations';


    // Pour afficher nommement des localités dans Voyager TCG

    public function localityId()
    {
        return $this->belongsToMany(Locality::class);
    }


    public function shows()
    {
        return $this->hasMany(Show::class);  // Une "location" peut héberger un ou plusieurs show
    }
    public function locality()
    {
        return $this->belongsTo(Locality::class); // Une "location" se trouve dans une et une seule locatité.
    }

    // Examen: Une location  a plusieurs salles de spectacle.
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
   
}
