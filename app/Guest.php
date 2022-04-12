<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'phoneNumber',
    ];


    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
