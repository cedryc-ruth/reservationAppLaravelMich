<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'languages';

    public function users()
    {
        return $this->hasMany(User::class);  // Une langue est parlée par plusieurs utilisateurs
    }
}
