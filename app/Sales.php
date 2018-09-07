<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
}
