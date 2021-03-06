<?php

namespace App\Http\Controllers;

use App\Buyin;
use App\Client;
use App\Stock;
use App\BuyinStockLink;
use Auth;
use Illuminate\Http\Request;

class BuyinController extends Controller
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
        $title = 'Buy-Ins';

        $buyins = Buyin::orderByDesc('created_at')->get();

        return view('buyin.index', compact('title','buyins'));
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

        $title = 'Create New Buy-In';

        $clientblade = [
            'create' => false,
            'edit' => false,
        ];

        $buyinblade = $stockblade = [
            'create' => true,
            'edit' => true,
        ];
        
        return view('buyin.create', compact('client','title','clientblade','stockblade','buyinblade'));
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
        // Buyin Details
        $this->validate(request(), [
            'client_id' => 'required|numeric',
            'cost_price' => 'required|numeric',
        ]);
        // Stock details
        for ($i=0; $i < sizeof(request('make')); $i++) { 
/*
        $this->validate(request(), [
            'client_id' => 'required|numeric',
            'make' => 'required|string',
            'model' => 'required|string',
            'description' => 'nullable|string',
            'serial' => 'required|string',
            'passcode' => 'required',
            'boxed' => 'required|string',
            'condition' => 'required|string',
            'notes' => 'nullable|string',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'category' => 'required|in:' . implode(',', Stock::$categories),
        ]);
*/            
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
                'aquisition_type' => 'buy-in',
                'user_id' => auth()->id(),
                'category' => request('category')[$i],
            ]);
            // Add stock_id to $newStockIds array
            array_push($newStockIds, $newStock->id);
        }

        // Create BuyIn
        $buyin = Buyin::create([
            'cost_price' => request('cost_price'),
            'user_id' => auth()->id(),
            'client_id' => request('client_id'),
        ]);

        // Create BuyinStockLink
        for ($i=0; $i < sizeof($newStockIds); $i++) { 
            BuyinStockLink::create([
                'buyin_id' => $buyin->id,
                'stock_id' => $newStockIds[$i],
            ]);
        }

        // Return to BuyIn index screen
        return redirect('/buyin')->with('status','New Buy-In created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function show(Buyin $buyin)
    {
        $title = 'Buy-In Details';

        $buyinblade = $stockblade = $clientblade = [
            'edit' => false,
            'create' => false,
        ];

        $client = $buyin->client;

        $stock = $buyin->stock;

        return view('buyin.show',compact('buyin', 'client', 'stock', 'title', 'buyinblade', 'clientblade', 'stockblade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyin $buyin)
    {
        $title = 'Edit Buy-In Details';

        $client = $buyin->client;

        $stock = $buyin->stock;

        $clientblade = $stockblade = [
            'edit' => false,
            'create' => false,
        ];

        $buyinblade = [
            'edit' => true,
            'create' => false,
        ];

        return view('buyin.edit', compact('buyin','client','stock','title','clientblade','stockblade','buyinblade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $buyin)
    {
        // validate
        $this->validate(request(), [
            'cost_price' => 'required|numeric',
        ]);

        // Update buyin
        Buyin::Where('id', $buyin)
            -> update(request([
            'cost_price',
            'pay_cash'
        ]));

        // Return to buyin index screen
        return redirect('/buyin')->with('status','Buy-In details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function destroy($buyin)
    {
        Buyin::destroy($buyin);

        //Return to buyin index screen
        return redirect('/buyin')->with('status','Buy-In deleted');
    }
}
