<?php

namespace App\Models;

use App\Models\ArtistType;
use App\Models\Representation;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Show extends Model
{
    use HasFactory;

    // public $timestamps = false;
    protected $guarded = ['id'];
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
        return $this->belongsToMany(ArtistType::class);  // Un show a plusieurs types d'artistes
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);  // Un show a plusieurs présentations
    }

    /**
     *  Export des listes de spectacles en Excel/CSV
     */

    // fonction statique qui retourne les colonnes de la table "shows" sous forme d'un tableau

    public static function getShow()
    {
        $records =  DB::table('shows')->select('id', 'title', 'slug', 'subtitle', 'poster_url', 'images', 'bookable', 'price', 'description', 'location_id')
                                      ->get()->toArray();
        return $records;
    }

}
