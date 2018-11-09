<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layaways extends Model
{
    protected $guarded = [];

    public function layawayStockLink()
    {
        return $this->hasMany(LayawayStockLink::class);
    }

    public function layawayPayment()
    {
        return $this->hasMany(LayawayPayment::class);
    }

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
