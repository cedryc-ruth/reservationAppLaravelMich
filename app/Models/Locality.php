<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locality extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'localities';

    public function locations()
    {
        return $this->hasMany(Location::class); // Dans une localité , on peut retrouver un ou plusieurs locations.
    }
}
