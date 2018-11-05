<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuybackStockLink extends Model
{
	protected $guarded = [];

	public function buyback() {
		return $this->belongsTo(Buyback::class);
	}

	public function stock() {
		return $this->belongsTo(Stock::class);
	}
}
