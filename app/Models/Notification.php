<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = ['employer_id', 'workman_name', 'workman_gender', 'workman_age', 'workman_occupation', 'workman_address', 'accident_time', 'accidentplace_id', 'accident_information', 'accident_outcome', 'accident_id', 'injury_id', 'hospital_name', 'doctor_name', 'action_taken', 'category_id', 'days_lost', 'weekly_wage', 'weekly_ration', 'weekly_housing', 'weekly_fuel', 'weekly_overtime', 'weekly_gross', 'effective_date', 'temp_incapacity_amout', 'temp_incapacity_medical', 'temp_incapacity_transport', 'permanent_partial_incapacity', 'permanent_total_incapacity', 'occupational_disease', 'death', 'total_compensation_amount', 'extra_notes', 'accident_serial_number', 'station', 'officer_responsible', 'status_id','entered_by', 'updated_by'];
                      

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function accident(){
        return $this->belongsTo(Accident::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function injury(){
        return $this->belongsTo(Injury::class);
    }

    public function accidentplace(){
        return $this->belongsTo(Accidentplace::class);
    }
}
