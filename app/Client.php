<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = [];

    public function buyin()
    {
        return $this->hasMany(Buyin::class);
    }

    public function addBuyin($buyin)
    {
        $this->buyin()->create(compact('buyin'));
    }
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'surname',
        'title',
        'postcode',
        'address',
        'dob',
        'phone_number',
        'id_verification_type',
        'client_banned',
        'notes',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}