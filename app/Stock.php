<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    public static $categories = [
        'Gaming',
        'Phones',
        'Computing',
        'Electronics',
        'Airguns',
        'Jewellery',
        'Tools',
        'Misc',
    ];

    protected $dates = [
       'seized_date',
    ];

    public function buyin()
    {
        return $this->belongsTo(Buyin::class);
    }

    public function buyback()
    {
        return $this->belongsTo(Buyback::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }

    public static function activeStock()
    {
        $notIn = Sales::get(['stock_id'])->toArray();
        return self::whereNotIn('id', $notIn)->get();
    }
}
