<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    

    public function types()
    {
        return $this->belongsToMany(Type::class,'artist_types','artist_id','type_id');  // Un artiste peut-être de plusieurs types
    }
}
