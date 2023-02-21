<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Employer;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::with('industry')->get();

        return view('employer.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::all();

        return view('employer.create', compact('industries'));
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
            'empname'=> 'required|string',
            'empaddress' => 'required',
            'empindustry' => 'required',
            'empinsurance' => 'string'
        ]);

        Employer::create([
            'emp_name'=> $request->input('empname'),
            'emp_address' => $request->input('empaddress'),
            'industry_id' => $request->input('empindustry'),
            'emp_insurance' => $request->input('empinsurance')
        ]);

        return redirect()->route('employer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        $industries = Industry::all();

        return view('employer.edit', compact('employer', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'empname'=> 'required|string',
            'empaddress' => 'required',
            'empindustry' => 'required',
            'empinsurance' => 'string'
        ]);

        $employer->update([
            'emp_name'=> $request->input('empname'),
            'emp_address' => $request->input('empaddress'),
            'industry_id' => $request->input('empindustry'),
            'emp_insurance' => $request->input('empinsurance')
        ]);

        return redirect()->route('employer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();

        return redirect()->route('employer.index');
    }
}
