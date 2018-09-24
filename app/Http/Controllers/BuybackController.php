<?php

namespace App\Http\Controllers;

use App\Buyback;
use App\Client;
use App\Stock;
use Auth;
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

        $buybacks = Buyback::all();

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
        // validate Stock and BuyBack details
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
            'loan_amount' => 'required|numeric',
            'term' => 'required|string',
            'selling_price' => 'required|numeric',
            'category' => 'required|in:' . implode(',', Stock::$categories),
        ]);

        // create stock
        $stock = Stock::create([
            'make' => request('make'),
            'model' => request('model'),
            'description' => request('description'),
            'serial' => request('serial'),
            'passcode' => true,
            'boxed' => request('boxed'),
            'condition' => request('condition'),
            'notes' => request('notes'),
            'selling_price' => request('selling_price'),
            'aquisition_type' => 'buy-back',
            'user_id' => auth()->id(),
            'category' => request('category'),
        ]);

        // Create BuyBack
        Buyback::create([
            'loan_amount' => request('loan_amount'),
            'term' => request('term'),
            'user_id' => auth()->id(),
            'client_id' => request('client_id'),
            'stock_id' => $stock->id,
        ]);

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

        //Return to buyin index screen
        return redirect('/buyback')->with('status','Buy-Back deleted');
    }
}
