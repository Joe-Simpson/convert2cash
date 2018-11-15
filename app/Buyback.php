<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $termWeeks = [
            '1 week' => 1,
            '2 weeks' => 2,
            '3 weeks' => 3,
            '4 weeks' => 4,
        ];

        $loanFee = ($this->loan_amount > 50) ? $termWeeks[$this->term] * $this->loan_amount * 0.1 : $termWeeks[$this->term] * 5 ;

        return $this->loan_amount + $loanFee;
    }
}
