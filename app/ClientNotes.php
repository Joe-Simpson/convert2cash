<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientNotes extends Model
{
	protected $guarded = [];

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
}