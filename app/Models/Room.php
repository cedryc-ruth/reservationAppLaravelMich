<?php

namespace App\Models;

use App\Models\Representation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'rooms';

    //Examen: Une salle de spectacle appartient à une et seule location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    //Examen : Une salle de spectacle acceuille plusieurs representations
    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}
