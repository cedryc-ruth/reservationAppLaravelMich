<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentationUser extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'representation_users';

    public function userId()
    {
        return $this->belongsToMany(User::class);
    }
}
