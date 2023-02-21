<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\Accidentplace;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Industry;
use App\Models\Injury;
use App\Models\Notification;
use App\Models\Status;
use App\Models\Update;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccidentNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::select('id', 'workman_name','accidentplace_id','accident_id','injury_id','employer_id')->with('accident:id,acc_agency', 'injury:id,inj_nature', 'employer:id,emp_name', 'accidentplace:id,acc_place')->limit(4000)->orderBy('id', 'desc')->get();

        return view('notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employers = Employer::all();
        $accidentagencies = Accident::all();
        $injurynatures = Injury::all();
        $injurylocations = Category::all();
        $accidentplaces = Accidentplace::all();
        $statuses = Status::all();

        $user = Auth::user()->name;
        $currenttime = Carbon::now();

        return view('notification.create', compact('accidentplaces', 'statuses', 'employers', 'accidentagencies', 'injurynatures', 'injurylocations', 'user', 'currenttime'));
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
            'empname' => 'required|string',
            'workman_name' => 'required|string',
            'workman_sex' => 'required|string',
            'workman_age' => 'required|integer',
            'occupation' => 'required|string',
            'address' => 'required|string',
            'acc_time' => 'required',
            'acc_place' => 'required',
            'acc_description' => 'required|string',
            'acc_agency' => 'required|string',
            'inj_nature' => 'required|string',
            'doc_name' => 'required|string',
            'hospital_name' => 'required',
            'action_taken' => 'required|string',
            'inj_location' => 'required',
            'lost_days' => 'required|integer',
            'weekly_wage' => 'required',
            'weekly_gross' => 'required',
            'effective_date' => 'required',
            'asn' => 'required',
            'station' => 'required',
            'officer' => 'required',
            'status' => 'required',
        ]);

        $user = Auth::user()->name;

        Notification::create([
            'employer_id' => $request->input('empname'),
            'workman_name' => $request->input('workman_name'),
            'workman_gender' => $request->input('workman_sex'),
            'workman_age' => $request->input('workman_age'),
            'workman_occupation' => $request->input('occupation'),
            'workman_address' => $request->input('address'),
            'accident_time' => $request->input('acc_time'),
            'accidentplace_id' => $request->input('acc_place'),
            'accident_information' => $request->input('acc_description'),
            'accident_outcome' => $request->input('acc_outcome'),
            'accident_id' => $request->input('acc_agency'),
            'injury_id' => $request->input('inj_nature'),
            'hospital_name' => $request->input('hospital_name'),
            'doctor_name' => $request->input('doc_name'),
            'action_taken' => $request->input('action_taken'),
            'category_id' => $request->input('inj_location'),
            'days_lost' => $request->input('lost_days'),
            'weekly_wage' => $request->input('weekly_wage'),
            'weekly_ration' => $request->input('weekly_ration'),
            'weekly_housing' => $request->input('weekly_housing'),
            'weekly_fuel' => $request->input('weekly_fuel'),
            'weekly_overtime' => $request->input('weekly_overtime'),
            'weekly_gross' => $request->input('weekly_gross'),
            'effective_date' => $request->input('effective_date'),
            'temp_incapacity_amout' => $request->input('temp_incapacity_amt'),
            'temp_incapacity_medical' => $request->input('temp_incapacity_med'),
            'temp_incapacity_transport' => $request->input('temp_incapacity_trnpt'),
            'permanent_partial_incapacity' => $request->input('permnt_partial_incapacity'),
            'permanent_total_incapacity' => $request->input('permnt_total_incapacity'),
            'occupational_disease' => $request->input('occ_disease'),
            'death' => $request->input('death'),
            'total_compensation_amount' => $request->input('total_comp_amt'),
            'extra_notes' => $request->input('add_notes'),
            'accident_serial_number' => $request->input('asn'),
            'station' => $request->input('station'),
            'officer_responsible' => $request->input('officer'),
            'status_id' => $request->input('status'),
            'entered_by' => $user,
            'updated_by' => $user,            
        ]);

        return redirect()->route('notification.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        $employers = Employer::where('id', $notification->employer_id)->get();        
        $industries = Industry::where('id', $employers[0]->industry_id)->get();
        $accidentagencies = Accident::where('id', $notification->accident_id)->get();
        $injurynatures = Injury::where('id', $notification->injury_id)->get();
        $injurylocations = Category::where('id', $notification->category_id)->get();
        $accidentplaces = Accidentplace::where('id', $notification->accidentplace_id)->get();
        $statuses = Status::where('id', $notification->status_id)->get();;

        $user = Auth::user()->name;
        $currenttime = Carbon::now();

        $updates = Update::where('notification_id', $notification->id)->get();

        return view('notification.view', compact('industries','accidentplaces', 'statuses', 'notification', 'employers', 'accidentagencies', 'injurynatures', 'injurylocations', 'user', 'currenttime', 'updates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {

        $employers = Employer::all();
        $accidentagencies = Accident::all();
        $injurynatures = Injury::all();
        $injurylocations = Category::all();
        $accidentplaces = Accidentplace::all();
        $statuses = Status::all();

        $user = Auth::user()->name;
        $currenttime = Carbon::now();

        return view('notification.edit', compact('accidentplaces', 'statuses', 'notification', 'employers', 'accidentagencies', 'injurynatures', 'injurylocations', 'user', 'currenttime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {

        $request->validate([
            'empname' => 'required|string',
            'workman_name' => 'required|string',
            'workman_sex' => 'required|string',
            'workman_age' => 'required|integer',
            'occupation' => 'required|string',
            'address' => 'required|string',
            'acc_time' => 'required',
            'acc_place' => 'required',
            'acc_description' => 'required|string',
            'acc_agency' => 'required|string',
            'inj_nature' => 'required|string',
            'doc_name' => 'required|string',
            'hospital_name' => 'required',
            'action_taken' => 'required|string',
            'inj_location' => 'required',
            'lost_days' => 'required|integer',
            'weekly_wage' => 'required',
            'weekly_gross' => 'required',
            'effective_date' => 'required',
            'asn' => 'required',
            'station' => 'required',
            'officer' => 'required',
            'status' => 'required',
        ]);

        $user = Auth::user()->name;

        $notification->update([
            'employer_id' => $request->input('empname'),
            'workman_name' => $request->input('workman_name'),
            'workman_gender' => $request->input('workman_sex'),
            'workman_age' => $request->input('workman_age'),
            'workman_occupation' => $request->input('occupation'),
            'workman_address' => $request->input('address'),
            'accident_time' => $request->input('acc_time'),
            'accidentplace_id' => $request->input('acc_place'),
            'accident_information' => $request->input('acc_description'),
            'accident_outcome' => $request->input('acc_outcome'),
            'accident_id' => $request->input('acc_agency'),
            'injury_id' => $request->input('inj_nature'),
            'hospital_name' => $request->input('hospital_name'),
            'doctor_name' => $request->input('doc_name'),
            'action_taken' => $request->input('action_taken'),
            'category_id' => $request->input('inj_location'),
            'days_lost' => $request->input('lost_days'),
            'weekly_wage' => $request->input('weekly_wage'),
            'weekly_ration' => $request->input('weekly_ration'),
            'weekly_housing' => $request->input('weekly_housing'),
            'weekly_fuel' => $request->input('weekly_fuel'),
            'weekly_overtime' => $request->input('weekly_overtime'),
            'weekly_gross' => $request->input('weekly_gross'),
            'effective_date' => $request->input('effective_date'),
            'temp_incapacity_amout' => $request->input('temp_incapacity_amt'),
            'temp_incapacity_medical' => $request->input('temp_incapacity_med'),
            'temp_incapacity_transport' => $request->input('temp_incapacity_trnpt'),
            'permanent_partial_incapacity' => $request->input('permnt_partial_incapacity'),
            'permanent_total_incapacity' => $request->input('permnt_total_incapacity'),
            'occupational_disease' => $request->input('occ_disease'),
            'death' => $request->input('death'),
            'total_compensation_amount' => $request->input('total_comp_amt'),
            'extra_notes' => $request->input('add_notes'),
            'accident_serial_number' => $request->input('asn'),
            'station' => $request->input('station'),
            'officer_responsible' => $request->input('officer'),
            'status_id' => $request->input('status'),
            'updated_by' => $user,            
        ]);

        return redirect()->route('notification.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notification.index');
    }
}
