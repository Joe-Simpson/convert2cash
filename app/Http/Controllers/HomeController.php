<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyback;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';

        $buybacks = Buyback::orderByDesc('created_at')
            ->get();

        foreach ($buybacks as $buyback) {
            $buyback->term_end = $buyback->created_at->add(\Carbon\CarbonInterval::fromString($buyback->term))->toDateString();
            if (! $buyback->buybackStockLink->first()->stock->seized && $buyback->cancelled == 0) {
                ($buyback->term_end < Carbon::now()->addDays(3)) ? $buyback->attention_1 = true : $buyback->attention_1 = false ;
                ($buyback->term_end = Carbon::now()->toDateString()) ? $buyback->attention_2 = true : $buyback->attention_2 = false ;
                ($buyback->term_end < Carbon::now()) ? $buyback->attention_3 = true : $buyback->attention_3 = false ;
            }
        }

        $buybacks = $buybacks->where('attention_1', true);

        $layaways = null;
        
        return view('home', compact('title','buybacks','layways'));
    }
}
