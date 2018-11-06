<?php

namespace App\Http\Controllers;

use App\Buyback;
use App\Client;
use App\Stock;
use App\BuybackStockLink;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BuybackController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Buy-Back\'s';

        $buybacks = Buyback::orderByDesc('created_at')->get();

        return view('buyback.index', compact('title','buybacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = Client::where ('id', $request->client_id)
            ->get()
            ->first();

        $title = 'Create New Buy-Back';

        $clientblade = [
            'create' => false,
            'edit' => false,
        ];

        $buybackblade = $stockblade = [
            'create' => true,
            'edit' => true,
        ];
        
        return view('buyback.create', compact('client','title','clientblade','stockblade','buybackblade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        // BuyBack details
        $this->validate(request(), [
            'client_id' => 'required|numeric',
            'loan_amount' => 'required|numeric',
            'term' => 'required|string',
        ]);
        // Stock details
        for ($i=0; $i < sizeof(request('make')); $i++) { 
            
        }

        $newStockIds = array();

        for ($i=0; $i < sizeof(request('make')); $i++) { 
             // Create Stock
            $newStock = Stock::create([
                'make' => request('make')[$i],
                'model' => request('model')[$i],
                'description' => request('description')[$i],
                'serial' => request('serial')[$i],
                'passcode' => true,
                'boxed' => request('boxed')[$i],
                'condition' => request('condition')[$i],
                'notes' => request('notes')[$i],
                'selling_price' => request('selling_price')[$i],
                'aquisition_type' => 'buy-back',
                'user_id' => auth()->id(),
                'category' => request('category')[$i],
            ]);
            // Add stock_id to $newStockIds array
            array_push($newStockIds, $newStock->id);
        }

        // Create BuyBack
        $buyback = Buyback::create([
            'loan_amount' => request('loan_amount'),
            'term' => request('term'),
            'user_id' => auth()->id(),
            'client_id' => request('client_id'),
        ]);

        // Create BuybackStockLink
        for ($i=0; $i < sizeof($newStockIds); $i++) { 
            BuybackStockLink::create([
                'buyback_id' => $buyback->id,
                'stock_id' => $newStockIds[$i],
            ]);
        }

        // Return to BuyBack index screen
        return redirect('/buyback')->with('status','New Buy-Back created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyback  $buyback
     * @return \Illuminate\Http\Response
     */
    public function show(Buyback $buyback)
    {
        $title = 'Buy-Back Details';

        $buybackblade = $stockblade = $clientblade = [
            'edit' => false,
            'create' => false,
        ];

        $client = $buyback->client;

        $stock = $buyback->stock;

        return view('buyback.show',compact('buyback', 'client', 'stock', 'title', 'buybackblade', 'clientblade', 'stockblade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyback  $buyback
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyback $buyback)
    {
        $title = 'Edit Buy-Back Details';

        $client = $buyback->client;

        $stock = $buyback->stock;

        $clientblade = $stockblade = [
            'edit' => false,
            'create' => false,
        ];

        $buybackblade = [
            'edit' => true,
            'create' => false,
        ];

        return view('buyback.edit', compact('buyback','client','stock','title','clientblade','stockblade','buybackblade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyback  $buyback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $buyback)
    {
        // validate
        $this->validate(request(), [
            'loan_amount' => 'required|numeric',
            'term' => 'required|string',
        ]);

        // Update buyback
        Buyback::Where('id', $buyback)
            -> update(request([
            'loan_amount',
            'term',
        ]));

        // Return to buyback index screen
        return redirect('/buyback')->with('status','Buy-Back details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyback  $buyback
     * @return \Illuminate\Http\Response
     */
    public function destroy($buyback)
    {
        Buyback::destroy($buyback);

        //Return to buyback index screen
        return redirect('/buyback')->with('status','Buy-Back deleted');
    }

    /**
     * Cancel buy-back record on the same day
     *
     * @param $buyback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Buyback $buyback)
    {
        $buyback->cancelled = true;
        $buyback->save();

        return redirect('/buyback')->with('status','Buy-Back cancelled');
    }

    /**
     * Record buy-back
     *
     * @param $buyback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buyBack(Buyback $buyback)
    {
        $buyback->bought_back_date = Carbon::now()->format('Y-m-d');
        $buyback->save();

        return redirect('/buyback')->with('status','Buy-Back recorded');
    }

    /**
     * Seize item
     *
     * @param $buyback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function seize(Buyback $buyback)
    {
        foreach ($buyback->buybackStockLink as $buybackStockLink) {
            $buybackStockLink->stock->seized = true;
            $buybackStockLink->stock->seized_date = Carbon::now()->format('Y-m-d');
            $buybackStockLink->stock->save();
        }

        return redirect('/buyback')->with('status','Stock seized!');
    }
}
