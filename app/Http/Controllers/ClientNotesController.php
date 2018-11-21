<?php

namespace App\Http\Controllers;

use App\ClientNotes;
use Illuminate\Http\Request;

class ClientNotesController extends Controller
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
    public function create()
    {
        //
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
            'body' => 'required|string',
        ]);

        // create client
        $newClientNote = ClientNotes::create($request->all());


        // Return to clients index screen
        return redirect('/clients/' . $request->client_id)
            ->with('status','New Client Note Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\client_notes  $client_notes
     * @return \Illuminate\Http\Response
     */
    public function show(clientNotes $clientNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\client_notes  $client_notes
     * @return \Illuminate\Http\Response
     */
    public function edit(clientNotes $clientNotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\client_notes  $client_notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clientNotes $clientNotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\client_notes  $client_notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientNotes $clientNotes)
    {
        //
    }
}
