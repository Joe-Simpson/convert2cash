<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $stock = Stock::all();
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
            'passcode' => 'nullable|string',
            'boxed' => 'required|string',
            'condition' => 'required|string',
            'notes' => 'nullable|string',
            'user' => 'required|string',
        ]);

        // If validation fails, return back with all data and errors

        // create stock
        Stock::create($request->all());


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
        // validate
        $this->validate(request(), [
            'make' => 'required|string',
            'model' => 'required|string',
            'description' => 'nullable|string',
            'serial' => 'required|string',
            'passcode' => 'nullable|string',
            'boxed' => 'required|string',
            'condition' => 'required|string',
            'notes' => 'nullable|string',
            'user' => 'required|string',
        ]);

        // Update stock
        Stock::Where('id', $stock)
            -> update(request([
            'make',
            'model',
            'description',
            'serial',
            'passcode',
            'boxed',
            'condition',
            'notes',
            'user',
        ]));

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
