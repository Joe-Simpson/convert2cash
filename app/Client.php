<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'id',
        'first_name',
        'surname',
        'title',
        'postcode',
        'address',
        'dob',
        'phone_number',
        'id_verification_type',
        'id_verification_type_2',
        'client_banned',
        'client_banned_reason',
        'notes',
        'client_image'
    ];

    public static $validationType1 = [
        'Driving Licence',
        'Passport',
        'Birth Cert',
        'Photo ID Card',
        'Bank Card',
        'Bus Pass',
        'NI Card',
    ];

    public static $validationType2 = [
        'Utility Bill',
        'Pay Slip',
        'Bank Statment',
        'An In Date letter',
    ];

    public function buyin()
    {
        return $this->hasMany(Buyin::class)->orderBy('created_at', 'desc');
    }

    public function buyback()
    {
        return $this->hasMany(Buyback::class)->orderBy('created_at', 'desc');
    }

    
    public function layaways()
    {
        return $this->hasMany(Layaways::class)->orderBy('created_at', 'desc');
    }
    

    public function addBuyback($buyback)
    {
        $this->buyback()->create(compact('buyback'));
    }

    public function addBuyin($buyin)
    {
        $this->buyin()->create(compact('buyin'));
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->surname;
    }

    public function clientNotes()
    {
        return $this->hasMany(ClientNotes::class)->orderBy('created_at', 'desc');
    }

    /**
     * Concat address and postcode in
     * numerous space separated string for
     * dumb searching
     *
     * @return string
     */
    public function addressSearchString()
    {
        return $this->postcode . ' ' . $this->address . ' ' .
            $this->address . ' ' . $this->postcode . ' ' .
            $this->address . $this->postcode . ' ' .
            $this->postcode . $this->address;
    }
}