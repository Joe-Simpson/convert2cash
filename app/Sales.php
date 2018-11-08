<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [];

    public function saleStockLink()
    {
        return $this->hasMany(SaleStockLink::class);
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
