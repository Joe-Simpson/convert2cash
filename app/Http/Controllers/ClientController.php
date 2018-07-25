<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
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
        $clients = Client::all();
        return view('clients.index', compact('clients') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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

        // Check client does not already exist
        $client = Client::where ('first_name', $request->first_name)
            ->where ('surname', $request->surname)
            ->where ('dob', $request->dob)
            ->get()
            ->first();


        // If client exists redirect to client edit view
        if ( $client ) {
            return view('client.edit', compact('client'));
        }

        // validate
        $this->validate(request(), [
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'title' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'required|string',
            'dob' => 'required|date',
            'phone_number' => 'required|max:11|min:11',
            'id_verification_type' => 'required|string',
            'customer_banned' => 'required|boolean',
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

        $clients = Client::all();
        return view('clients.index', compact('clients') );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        dd($client);


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
    public function destroy($client)
    {
        // dd( $client );

        Client::destroy($client);

        //Return to clients index screen
        $clients = Client::all();
        return view('clients.index', compact('clients') );
    }
}
