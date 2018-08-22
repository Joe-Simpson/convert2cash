<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyin extends Model
{
    protected $guarded = [];
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	//Put table fields here
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
