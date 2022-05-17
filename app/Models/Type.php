<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function artists()
    {
        return $this->belongsToMany(Artist::class,'artist_types','artist_id','type_id');  // Un type donné peut concerner plusieurs artistes. 
    }
}
