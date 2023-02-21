<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

        $tinjuries = count(Notification::where('accident_outcome', "Injury")->get());
        $tdeath = count(Notification::where('accident_outcome', "Death")->get());
        $tillness = count(Notification::where('accident_outcome', "Illness")->get());
        $tnorecord = count(Notification::where('accident_outcome', "Not Recorded")->get());

        //count($tinjuries);

        return view('welcome', compact('tinjuries', 'tdeath', 'tillness', 'tnorecord'));
    }
}
