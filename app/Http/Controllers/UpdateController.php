<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Update;
use App\Models\Updatestatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updates = Update::with('notification', 'updatestatus')->limit(4000)->orderBy('id', 'desc')->get();

        return view('updates.index', compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accidents = Notification::all();
        $actions = Updatestatus::all();

        return view('updates.create', compact('accidents','actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->name;

        $request->validate([
            'accidentnum' => 'required',
            'actiontype' => 'required',
            'remarks' => 'required',
        ]);

        Update::create([
            'notification_id' => $request->input('accidentnum'),
            'updatestatus_id' => $request->input('actiontype'),
            'remarks' => $request->input('remarks'),
            'username' => $user,
            'lastupdate_username' => $user,
        ]);

        return redirect()->route('updates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        $accidents = Notification::all();
        $actions = Updatestatus::all();

        return view('updates.edit', compact('update', 'accidents', 'actions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        $user = Auth::user()->name;

        $request->validate([
            'accidentnum' => 'required',
            'actiontype' => 'required',
            'remarks' => 'required',
        ]);

        $update->update([
            'notification_id' => $request->input('accidentnum'),
            'updatestatus_id' => $request->input('actiontype'),
            'remarks' => $request->input('remarks'),
            'lastupdate_username' => $user,
        ]);

        return redirect()->route('updates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        $update->delete();

        return redirect()->route('updates.index');
    }
}
