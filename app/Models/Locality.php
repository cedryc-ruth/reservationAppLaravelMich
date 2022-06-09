<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locality extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'localities';

    public function locations()
    {
        return $this->hasMany(Location::class); // Une localité donnée (une occurence) peut abriter plusieurs locations.
    }
}
