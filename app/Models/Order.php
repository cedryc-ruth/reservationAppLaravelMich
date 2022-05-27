<?php

namespace App\Models;

use App\Models\User;
use App\Models\Representation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representations()
    {
        return $this->belongsToMany(Representation::class,'order_representations','order_id','representation_id')->withPivot('places');
    }
}
