<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_Notes extends Model
{
    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
}