<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function locations()
    {
        return $this->hasMany(Location::class); // Dans une localité , on peut retrouver un ou plusieurs locations.
    }
}
