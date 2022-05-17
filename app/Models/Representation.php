<?php

namespace App\Models;

use App\Models\Show;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Representation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $dates = ['when'];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function users()
    {
        $this->belongsToMany(User::class, 'representation_users', 'user_id', 'representation_id');
    }

    public function showId()
    {
        return $this->belongsTo(Show::class);
    }

    public function locationId()
    {
        return $this->belongsTo(Location::class);
    }
}
