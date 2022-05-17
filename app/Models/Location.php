<?php

namespace App\Models;

use App\Models\Representation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function shows()
    {
        return $this->hasMany(Show::class);  // Une "location" peut héberger un ou plusieurs show
    }
    public function locality()
    {
        return $this->belongsTo(Locality::class); // Une "location" se trouve dans une et une seule locatité.
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}
