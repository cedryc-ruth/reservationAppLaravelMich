<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Language;
use Laravel\Cashier\Billable;
use App\Models\Representation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable ;
// use Illuminate\Foundation\Auth\User as Authenticatable ;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as VoyagerUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends VoyagerUser implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Authenticatable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'language_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function representations()
    { 
        return $this->belongsToMany(Representation::class)->withPivot('places');  // Un user peut acheter plusieurs représentations
    }
    public function language()
    {
        return $this->belongsTo(Language::class);  // Un utilisateur a une et une seule langue "principale"
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class); // Un user peut plusieurs ordres d'achat
    }
    
}
