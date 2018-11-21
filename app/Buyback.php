<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Buyback extends Model
{
    protected $guarded = [];

    protected $dates =[
        'bought_back_date',
        'created_at',
        'renew_date',
    ];

    public function buybackStockLink()
    {
        return $this->hasMany(BuybackStockLink::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function amountDue()
    {
        $term = \Carbon\CarbonInterval::fromString($this->term);
        $term_end = $this->created_at->add( $term );

        $weeks_overdue = ( $term_end < Carbon::now()) ? $term_end->diffInWeeks(Carbon::now()) : 0 ;
        
        $overdue_fee = ($this->loan_amount > 50) ? floor($weeks_overdue) * 0.1 * $this->loan_amount : $overdue_fee = floor($weeks_overdue) * 5 ;

        return $this->loan_amount + $overdue_fee;
    }
}
