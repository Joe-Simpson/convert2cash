<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = [];

    public function buyin()
    {
        return $this->hasMany(Buyin::class);
    }

    public function buyback()
    {
        return $this->hasMany(Buyback::class);
    }

    public function addBuyback($buyback)
    {
        $this->buyback()->create(compact('buyback'));
    }

    public function addBuyin($buyin)
    {
        $this->buyin()->create(compact('buyin'));
    }
}