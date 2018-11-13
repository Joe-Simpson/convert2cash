<?php

namespace App\Http\Controllers;

use App\LayawayPayment;
use Illuminate\Http\Request;

class LayawayPaymentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // validate
        $this->validate(request(), [
            'payment' => 'required|numeric',
            'layaways_id' => 'required|string',
        ]);

        // create client
        $newLayawayPayment = LayawayPayment::create($request->all());


        // Return to clients index screen
        return redirect('/layaways/' . $request->layaways_id)
            ->with('status','New Layaway Payment');
    }

}
