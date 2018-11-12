<?php

namespace App\Http\Controllers;

use App\Layaways;
use App\LayawayPayment;
use App\LayawayStockLink;
use App\Client;
use App\Stock;
use Illuminate\Http\Request;

class LayawaysController extends Controller
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
        $title = 'Layaways';

        $layaways = Layaways::orderByDesc('created_at')->get();

        return view('layaways.index', compact('title','layaways'));
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

        $title = 'Create New Layaway';

        $clientblade = [
            'create' => false,
            'edit' => false,
        ];

        $layawaysblade = $stockblade = [
            'create' => true,
            'edit' => true,
        ];
        
        $stocks = Stock::sellableStock();

        return view('layaways.create', compact('client','title','stocks','clientblade','layawaysblade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = [
            'price_adjustment' => 'required|numeric',
            'deposit' => 'required|numeric|min:20',
            'deposit_paid' => 'required',
        ];

        // validate
        $this->validate(request(), $validation);

        // Create Layaway record
        $layaway = Layaways::create([
            'user_id' => \Auth::user()->id,
            'client_id' => request('client_id'),
            'price_adjustment' => floatval(request('price_adjustment')),
            'deposit' => floatval(request('deposit')),
            'deposit_paid' => true,
        ]);

        // Create Layaway Stock Link
        for ($i=0; $i < sizeof(request('stock_search')); $i++) {             
            LayawayStockLink::create([
                'stock_id' => request('stock_search')[$i],
                'layaways_id' => $layaway->id,
            ]);
        }

        // Return to stock index screen
        return redirect('/layaways')->with('status','New Layaway created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Layaways  $layaways
     * @return \Illuminate\Http\Response
     */
    public function show(Layaways $layaways)
    {
        $title = 'Layaway Details';

        $layawaysblade = $stockblade = $clientblade = [
            'edit' => false,
            'create' => false,
        ];

        ( isset($layaways->client) ) ? $client = $layaways->client : $client = [];

        $stock = $layaways->layawaysStockLink;

        return view('layaways.show',compact('layaways', 'client', 'stock', 'title', 'layawaysblade', 'clientblade', 'stockblade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Layaways  $layaways
     * @return \Illuminate\Http\Response
     */
    public function edit(Layaways $layaways)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Layaways  $layaways
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layaways $layaways)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Layaways  $layaways
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layaways $layaways)
    {
        //
    }
}