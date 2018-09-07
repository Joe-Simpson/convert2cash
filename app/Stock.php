<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    public function buyin()
    {
        return $this->belongsTo(Buyin::class);
    }

    public function buyback()
    {
        return $this->belongsTo(Buyback::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }
}
