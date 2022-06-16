<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Show;
use App\Models\User;
use App\Models\Order;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Representation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $dates = ['when'];
    protected $table = 'representations';

    public function show()
    {
        return $this->belongsTo(Show::class); // Une occurrence de la représention appartient à un et un seul show
    }

    // public function location()
    // {
    //     return $this->belongsTo(Location::class); // Une occurrence de la représentation s'est déroule à un et un seul lieux
    // }

    public function users()
    {
        $this->belongsToMany(User::class); // Une occurrence de la représentation peut être achetée par plusieurs users
    }

    public function showId()  // La fonction showId() permet d'afficher le titre du show dans le menu déroulant de Voyager TCG
    {
        return $this->belongsTo(Show::class);
    }

    public function locationId()  // Même rôle que showId()
    {
        return $this->belongsTo(Location::class);
    }

    public function orders()
    {
        // return $this->belongsToMany(Order::class,'order_representations','order_id','representation_id');
        return $this->belongsToMany(Order::class);
    }

    // Exame Une representation donnée (une occurence ) se déroule dans une et une seule salle de spectacle
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
