<?php

namespace App\Http\Controllers;

use App\Sales;
use App\Client;
use App\Stock;
use Illuminate\Http\Request;

class SalesController extends Controller
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
        $title = 'Sales';

        $sales = Sales::all();

        return view('sales.index', compact('title','sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $stock = Stock::where ('id', $request->stock_id)
            ->get()
            ->first();

        $title = 'Create New Sale';

        $clientblade = $stockblade = [
            'create' => false,
            'edit' => false,
        ];

        $salesblade = [
            'create' => true,
            'edit' => true,
        ];

        $clients = Client::all();
        
        return view('sales.create', compact('stock','title','clientblade','stockblade','salesblade', 'clients'));
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
            'stock_id' => 'required|exists:stocks,id',
            'price_adjustment' => 'required|string',
            'payment_method' => 'required|in:card,cash',
        ];

//        dd(request('client_search'));

        if (request('client_search')) {
            $validation['client_search'] = 'exists:clients,id';
        }

        // validate
        $this->validate(request(), $validation);

        // If validation fails, return back with all data and errors

        // create stock
        Sales::create([
            'stock_id' => request('stock_id'),
            'client_id' => request('client_search'),
            'price_adjustment' => floatval(request('price_adjustment')),
            'payment_method' => request('payment_method'),
            'user_id' => \Auth::user()->id,
        ]);


        // Return to stock index screen
        return redirect('/sales')->with('status','New sale created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(sales $sales)
    {
        //
    }
}
