<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyinStockLink extends Model
{
	protected $guarded = [];

	public function buyin() {
		return $this->belongsTo(Buyin::class);
	}

	public function stock() {
		return $this->belongsTo(Stock::class);
	}
}
