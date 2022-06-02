<?php

namespace App\Models;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'types';

    public function artists()
    {
        return $this->belongsToMany(Artist::class);  // Un type donné peut concerner plusieurs artistes.
    }
}
