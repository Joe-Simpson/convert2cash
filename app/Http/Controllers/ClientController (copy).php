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
        $title = 'Client List';
        $clients = Client::all();
        return view('clients.index', compact('clients','title') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Client';
        $edit = true;
        $create = true;
        return view('clients.create', compact('title','edit','create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Check client does not already exist
        $client = Client::where ('first_name', $request->first_name)
            ->where ('surname', $request->surname)
            ->where ('dob', $request->dob)
            ->get()
            ->first();

        // If client exists redirect to client edit view
        if ( $client ) {
            $title = 'Edit Client Details';
            $edit = true;
            $create = false;
            return view('clients.edit', compact('client','title','edit','create'));
        }


        // Populate empty non-required fields
        // customer_banned
        if ( ! isset($request['customer_banned'])) {
            $request['customer_banned'] = 0;
        }
        //address
        if ( ! isset($request['address'])) {
            $request['address'] = NULL;
        }

        // validate
        $this->validate(request(), [
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'title' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'nullable|string',
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

        $title = 'Clients';
        $clients = Client::all();
        return view('clients.index', compact('clients','title') );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {   
        $title = 'Client Details';
        $edit = false;
        $create = false;
        return view('clients.show', compact('client','title','edit','create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $title = 'Edit Client Details';
        $edit = true;
        $create = false;
        return view('clients.edit', compact('client','title','edit','create'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client)
    {
        // validate
        $this->validate(request(), [
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'title' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'nullable|string',
            'dob' => 'required|date',
            'phone_number' => 'required|max:11|min:11',
            'id_verification_type' => 'required|string',
            'customer_banned' => 'nullable|boolean',
        ]);

        Client::Where('id', $client)
            -> update(request([
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

        $title = 'Clients';
        $clients = Client::all();
        return view('clients.index', compact('clients','title') );
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
        $title = 'Clients';
        $clients = Client::all();
        return view('clients.index', compact('clients','title') );
    }
}