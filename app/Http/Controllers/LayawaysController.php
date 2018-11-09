<?php

namespace App\Http\Controllers;

use App\Layaways;
use App\Payment;
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

        $layawayblade = $stockblade = [
            'create' => true,
            'edit' => true,
        ];
        
        $stocks = Stock::sellableStock();

        return view('layaways.create', compact('client','title','stocks','clientblade','layawayblade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Layaways  $layaways
     * @return \Illuminate\Http\Response
     */
    public function show(Layaways $layaways)
    {
        //
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
