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

    public function buybackStockLink()
    {
        return $this->belongsTo(BuybackStockLink::class);
    }

    public function buyinStockLink()
    {
        return $this->belongsTo(BuyinStockLink::class);
    }

    public function saleStockLink()
    {
        return $this->belongsTo(Sales::class);
    }

    public function layawayStockLink()
    {
        return $this->belongsTo(LayawayStockLink::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function activeStock()
    {
        // Stock that is not [sold, layaway, buyback + cancelled]
        // Sold Stock
        $sales = Sales::get(['id'])->toArray();
        $stockSales = SaleStockLink::whereIn('sales_id', $sales)
            ->get()
            ->pluck('stock_id')
            ->all();
        // Stock on Layaway
        $layaways = Layaways::get(['id'])->toArray();
        $stockLayaways = LayawayStockLink::whereIn('layaways_id', $layaways)
            ->get()
            ->pluck('stock_id')
            ->all();
        // Cancelled Buybacks
        $bbCancelled = Buyback::where('cancelled', 1)
            ->get(['id'])
            ->toArray();
        $bbCStock = BuybackStockLink::whereIn('buyback_id', $bbCancelled)
            ->get()
            ->pluck('stock_id')
            ->all();

        // Combin arrays
        $notIn = array_merge($stockSales, $stockLayaways, $bbCStock);

        return self::whereNotIn('id', $notIn)->get();
    }

    public static function sellableStock()
    {
        // Stock that is not [sold, layaway, buyback + cancelled, buyback + not seized]
        // Sold Stock
        $sales = Sales::get(['id'])->toArray();
        $stockSales = SaleStockLink::whereIn('sales_id', $sales)
            ->get()
            ->pluck('stock_id')
            ->all();
        // Stock on Layaway
        $layaways = Layaways::get(['id'])->toArray();
        $stockLayaways = LayawayStockLink::whereIn('layaways_id', $layaways)
            ->get()
            ->pluck('stock_id')
            ->all();
        // Cancelled Buybacks
        $bbCancelled = Buyback::where('cancelled', 1)
            ->get(['id'])
            ->toArray();
        $bbCStock = BuybackStockLink::whereIn('buyback_id', $bbCancelled)
            ->get()
            ->pluck('stock_id')
            ->all();
        // Buybacks not seized
        $bbNotSeized = self::where([
                ['seized', 0],
                ['aquisition_type', 'buy-back']
            ])->get()
            ->pluck('id')
            ->all();

        // Combine Arrays
        $notIn = array_merge($stockSales, $stockLayaways, $bbCStock, $bbNotSeized);

        return self::whereNotIn('id', $notIn)->get();
    }
}
