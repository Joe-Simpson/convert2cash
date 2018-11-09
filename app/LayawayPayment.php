<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayawayPayment extends Model
{
    protected $guarded = [];

    public function layaway()
    {
    	return $this->belongsTo(Layaways::class);
    }
}
