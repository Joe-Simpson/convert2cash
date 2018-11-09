<?php

namespace App\Http\Controllers;

use App\Sales;
use App\Client;
use App\Stock;
use App\SaleStockLink;
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

        $sales = Sales::orderByDesc('created_at')->get();

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
        $title = 'Create New Sale';

        $clientblade = $stockblade = [
            'create' => false,
            'edit' => false,
        ];

        $salesblade = [
            'create' => true,
            'edit' => true,
        ];
        
        $stocks = Stock::sellableStock();

        $clients = Client::all();
        
        return view('sales.create', compact('stocks','title','clientblade','stockblade','salesblade', 'clients'));
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
            'payment_method' => 'required|in:card,cash',
        ];

        if (request('client_search')) {
            $validation['client_search'] = 'exists:clients,id';
        }

        // dd(sizeof(request('stock_search')));

        // validate
        $this->validate(request(), $validation);

        // Create Sale record
        $sale = Sales::create([
            'client_id' => request('client_search'),
            'price_adjustment' => floatval(request('price_adjustment')),
            'payment_method' => request('payment_method'),
            'user_id' => \Auth::user()->id,
        ]);

        // Create Sale Stock Link
        for ($i=0; $i < sizeof(request('stock_search')); $i++) {             
            SaleStockLink::create([
                'stock_id' => request('stock_search')[$i],
                'sales_id' => $sale->id,
            ]);
        }

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
        $title = 'Sale Details';

        $salesblade = $stockblade = $clientblade = [
            'edit' => false,
            'create' => false,
        ];

        ( isset($sales->client) ) ? $client = $sales->client : $client = [];

        $stock = $sales->salesStockLink;

        return view('sales.show',compact('sales', 'client', 'stock', 'title', 'salesblade', 'clientblade', 'stockblade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        $title = 'Edit Sale Details';

        ( isset($sales->client) ) ? $client = $sales->client : $client = [];

        $stock = $sales->SaleStockLink;

        $clientblade = $stockblade = [
            'edit' => false,
            'create' => false,
        ];

        $salesblade = [
            'edit' => true,
            'create' => false,
        ];

        return view('sales.edit', compact('sales','client','stock','title','clientblade','stockblade','salesblade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sales)
    {
        // validate
        $temp = $this->validate(request(), [
            'price_adjustment' => 'required|numeric',
            'payment_method' => 'required|in:card,cash',
        ]);

        // Update Sale
        Sales::Where('id', $sales)
            -> update([
            'price_adjustment' => request('price_adjustment'),
            'payment_method' => request('payment_method'),
        ]);

        // Return to buyback index screen
        return redirect('/sales/' . $sales)->with('status','Sale details updated');
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
