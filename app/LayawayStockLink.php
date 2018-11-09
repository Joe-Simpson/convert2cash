<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayawayStockLink extends Model
{
    protected $guarded = [];

    public function layaway()
    {
    	return $this->belongsTo(Layaways::class);
    }

    public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }
}
