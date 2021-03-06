<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Stock;

class StockController extends Controller
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
        $title = 'Stock List';
        $stock = Stock::activeStock();
        return view('stock.index', compact('stock','title') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Stock';
        $stockblade = [
            'edit' => true,
            'create' => true,
        ];
        return view('stock.create', compact('title','stockblade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate(request(), [
            'make' => 'required|string',
            'model' => 'required|string',
            'description' => 'nullable|string',
            'serial' => 'required|string',
            'passcode' => 'required',
            'boxed' => 'required|string',
            'condition' => 'required|string',
            'notes' => 'nullable|string',
            'selling_price' => 'required|numeric'
        ]);

        // If validation fails, return back with all data and errors

        // create stock
        Stock::create([
            'make' => request('make'),
            'model' => request('model'),
            'description' => request('description'),
            'serial' => request('serial'),
            'passcode' => true,
            'boxed' => request('boxed'),
            'condition' => request('condition'),
            'notes' => request('notes'),
            'selling_price' => request('selling_price'),
            'aquisition_type' => 'other',
            'user_id' => auth()->id(),
        ]);


        // Return to stock index screen
        return redirect('/stock')->with('status','New Stock Item created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        $title = 'Stock Details';
        $stockblade = [
            'edit' => false,
            'create' => false,
        ];
        return view('stock.show',compact('stock','title','stockblade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $title = 'Edit Stock Details';
        $stockblade = [
            'edit' => true,
            'create' => false,
        ];
        return view('stock.edit',compact('stock','title','stockblade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stock)
    {

        if ( $request->stock_loss_type[0] == "false") {
            $stock_loss_date = NULL;
        } else {
            $stock_loss_date = Carbon::now()->format('Y-m-d');
        }

        // Update stock
        Stock::Where('id', $stock)
            -> update([
                'make' => request('make')[0],
                'model' => request('model')[0],
                'description' => request('description')[0],
                'serial' => request('serial')[0],
                'passcode' => true,
                'boxed' => request('boxed')[0],
                'condition' => request('condition')[0],
                'notes' => request('notes')[0],
                'selling_price' => request('selling_price')[0],
                'user_id' => auth()->id(),
                'stock_loss_type' => request('stock_loss_type')[0],
                'stock_loss_date' => $stock_loss_date,
            ]);

        // Return to stock index screen
        return redirect('/stock/')->with('status','Stock details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($stock)
    {
        Stock::destroy($stock);

        //Return to stock index screen
        return redirect('/stock/')->with('status','Stock deleted');
    }
}
