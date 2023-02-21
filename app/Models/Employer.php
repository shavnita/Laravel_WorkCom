<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Industry;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['emp_name', 'emp_address','industry_id','emp_insurance'];

    public function industry(){

        return $this->belongsTo(Industry::class);

    }
}
