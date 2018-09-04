<?php

namespace App\Http\Controllers;

use App\Buyin;
use App\Client;
use App\Stock;
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
        $title = 'Buy-In\'s';

        $buyins = Buyin::all();

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
        // validate Stock and BuyIn details
        $this->validate(request(), [
            'client_id' => 'required|numeric',
            'make' => 'required|string',
            'model' => 'required|string',
            'description' => 'nullable|string',
            'serial' => 'required|string',
            'passcode' => 'nullable|string',
            'boxed' => 'required|string',
            'condition' => 'required|string',
            'notes' => 'nullable|string',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
        ]);

        // create stock
        $stock = Stock::create([
            'make' => request('make'),
            'model' => request('model'),
            'description' => request('description'),
            'serial' => request('serial'),
            'passcode' => request('passcode'),
            'boxed' => request('boxed'),
            'condition' => request('condition'),
            'notes' => request('notes'),
            'selling_price' => request('selling_price'),
            'aquisition_type' => 'buy-in',
            'user_id' => auth()->id(),
        ]);

        // Create BuyIn
        Buyin::create([
            'cost_price' => request('cost_price'),
            'pay_cash' => request('pay_cash'),
            'user_id' => auth()->id(),
            'client_id' => request('client_id'),
            'stock_id' => $stock->id,
        ]);

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
