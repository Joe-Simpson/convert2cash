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
       'loss_date',
    ];

    public function buyin()
    {
        return $this->belongsTo(Buyin::class);
    }

    public function buybackStockLink()
    {
        return $this->belongsTo(buybackStockLink::class);
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
        $stockSales = Sales::get(['stock_id'])->toArray();
        // This bit needs updating to use the BuybackStockLink table
        // $bbCancelled = Buyback::where('cancelled', 1)->get(['stock_id'])->toArray();
        // $notIn = array_merge($stockSales, $bbCancelled);
        $notIn = $stockSales;
        return self::whereNotIn('id', $notIn)->get();
    }
}
