<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyin extends Model
{
    protected $guarded = [];

    public function buyinStockLink()
    {
        return $this->hasMany(BuyinStockLink::class);
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
