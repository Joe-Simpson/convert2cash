<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients/index', compact('clients') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( ! isset($request['customer_banned'])) {
            $request['customer_banned'] = 0;
        }

        // validate
        $this->validate(request(), [
            'first_name' => 'required',
            'surname' => 'required',
            'title' => 'required',
            'postcode' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'phone_number' => 'required',
            'id_verification_type' => 'required',
            'customer_banned' => 'required',
        ]);

        // create client
        Client::create(request([
            'first_name',
            'surname',
            'title',
            'postcode',
            'address',
            'dob',
            'phone_number',
            'id_verification_type',
            'customer_banned',
        ]));

        // index();
        
        $clients = Client::all();
        return view('clients/index', compact('clients') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
