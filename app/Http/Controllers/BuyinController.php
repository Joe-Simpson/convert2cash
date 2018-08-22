<?php

namespace App\Http\Controllers;

use App\Buyin;
use App\Client;
use Illuminate\Http\Request;

class BuyinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $title = 'Create New Buy-In';
        $clientblade = [
            'create' => false,
            'edit' => false,
        ];
        $stockblade = [
            'create' => true,
            'edit' => true,
        ];
        return view('buyin.create', compact('client','title','clientblade','stockblade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function show(Buyin $buyin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyin $buyin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyin $buyin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyin  $buyin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyin $buyin)
    {
        //
    }
}
