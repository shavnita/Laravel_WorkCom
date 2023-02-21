<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accidents = Accident::all();

        return view('accident.index', compact('accidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accident.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'accagency' => 'required|string'
        ]);

        Accident::create([
            'acc_agency' => $request->input('accagency'),
        ]);

        return redirect()->route('accident.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $accident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit(Accident $accident)
    {
        return view('accident.edit', compact('accident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accident $accident)
    {
        $request->validate([
            'accagency' => 'required|string'
        ]);

        $accident->update([
            'acc_agency' => $request->input('accagency')
        ]);

        return redirect()->route('accident.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $accident)
    {
        $accident->delete();

        return redirect()->route('accident.index');
    }
}
