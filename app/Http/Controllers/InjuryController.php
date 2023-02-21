<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $injuries = Injury::all();

        return view('injury.index', compact('injuries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('injury.create');
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
            'injnature' => 'required|string'
        ]);

        Injury::create([
            'inj_nature' => $request->input('injnature'),
        ]);

        return redirect()->route('injury.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function show(Injury $injury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function edit(Injury $injury)
    {
        return view('injury.edit', compact('injury'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Injury $injury)
    {
        $request->validate([
            'injnature' => 'required|string'
        ]);

        $injury->update([
            'inj_nature' => $request->input('injnature'),
        ]);

        return redirect()->route('injury.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Injury  $injury
     * @return \Illuminate\Http\Response
     */
    public function destroy(Injury $injury)
    {
        $injury->delete();

        return redirect()->route('injury.index');
    }
}
