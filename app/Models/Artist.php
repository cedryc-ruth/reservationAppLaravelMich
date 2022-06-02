<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'artists';
    

    public function types()
    {
        return $this->belongsToMany(Type::class);  // Un artiste peut-être de plusieurs types
    }
}
