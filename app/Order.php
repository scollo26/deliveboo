<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'totalPrice',
        'state_id'
    ];

    public function plates()
    {
        return $this->belongsToMany('App\Plate')->withPivot('quantity');
    }

    public function guest()
    {
        return $this->hasOne('App\Guest');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
