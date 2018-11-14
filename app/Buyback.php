<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyback extends Model
{
    protected $guarded = [];

    protected $dates =[
        'bought_back_date',
        'created_at',
        'renew_date',
    ];

    public function buybackStockLink()
    {
        return $this->hasMany(BuybackStockLink::class);
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
