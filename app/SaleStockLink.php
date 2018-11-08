<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStockLink extends Model
{
    protected $guarded = [];

    public function sale()
    {
    	return $this->belongsTo(Sales::class);
    }

    public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }
}
