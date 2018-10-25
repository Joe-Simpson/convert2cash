<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientNotes;
use App\ClientImages;

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
        $clientblade = [
            'edit' => true,
            'create' => true,
        ];
        return view('clients.create', compact('title','clientblade'));
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
            $route = '/clients/' . $client -> id . '/edit';
            return redirect($route)->with('client');
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
            'id_verification_type' => 'required|in:' . implode(',', Client::$validationType1),
            'id_verification_type_2' => 'required|in:' . implode(',', Client::$validationType2),
            'client_image' => 'required|string',
        ]);

        // If validation fails, return back with all data and errors

        // create client
        $newClient = Client::create($request->all());

        // Return to clients index screen
        return redirect('/clients/' . $newClient->id)->with('status','New Client created');

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

        $clientblade = [
            'edit' => false,
            'create' => false,
        ];
        return view('clients.show', compact('client','title','clientblade'));
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
        $clientblade = [
            'edit' => true,
            'create' => false,
        ];
        return view('clients.edit', compact('client','title','clientblade'));
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
            'id_verification_type' => 'required|in:' . implode(',', Client::$validationType1),
            'id_verification_type_2' => 'required|in:' . implode(',', Client::$validationType2),
            'client_image' => 'required|string'
        ]);

        $clientDetails = request([
            'first_name',
            'surname',
            'title',
            'postcode',
            'address',
            'dob',
            'phone_number',
            'id_verification_type',
            'id_verification_type_2',
            'client_banned',
            'client_image',
        ]);

        // client banned validation this way, as required_if having issues with true/false
        if ($request->get('client_banned') == 'true') {
            if (empty($request->get('client_banned_reason'))) {
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors('Client banned needs reason');
            }

            $clientDetails['client_banned_reason'] = $request->get('client_banned_reason');
        }

        // Update client
        Client::Where('id', $client)
            -> update($clientDetails);

        // Return to clients index screen
        return redirect('/clients/')->with('status','Client details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client)
    {
        Client::destroy($client);

        //Return to clients index screen
        return redirect('/clients/')->with('status','Client deleted');
    }

    public function notes($client)
    {
        return response()->json(['notes' => $client->notes]);
    }
}
