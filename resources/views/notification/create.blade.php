<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notice of Accident by Employer') }}
        </h2>
    </x-slot>

    <style>
        label{
            font-weight: bold;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @endif

                    <form action="{{route('notification.store')}}" method="POST">
                        
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Employer</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="empname">Employer Name :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" name="empname" required>
                                    @foreach ($employers as $employer )
                                        <option value="{{ $employer->id }}">{{ $employer->emp_name }} - ( {{ $employer->emp_address }} )</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Workman</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="workman_name">Wokrman Name :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value=""
                                    name="workman_name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="workman_sex">Gender :</label>
                            </div>
                            <div class="col-md-8 form-group">                            
                                <select class="form-select" name="workman_sex" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="workman_age">Age :</label>
                            </div>
                            <div class="col-md-8 form-group">                            
                                <input type="number" name="workman_age" placeholder="Age" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="occupation">Occupation (avoid the term "labourer" where possible) :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" name="occupation" placeholder="Occupation" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="address">Residential Address :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" required
                                    name="address" placeholder="Home Address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Accident / Death From Any Cause</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="acc_time">Date and Hour :</label>
                            </div>
                            <div class="col-md-8 form-group">
                             
                                <input name="acc_time" class="form-control" type="datetime-local" id="time" placeholder="Accident time" required/>  
                                      
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="acc_place">Accident Place</label>
                            </div>
                            <div class="col-md-8 form-group">   
                                <select class="form-select" name="acc_place" required>
                                    @foreach ($accidentplaces as $accidentplace)
                                        <option value="{{$accidentplace->id}}">{{ $accidentplace->acc_place}}</option>
                                    @endforeach
                                </select>  
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="acc_description">Description of accident/death including a clear statement of exactly 
                                    what the workman was doing at the time of the accident/death :</label>
                            </div>
                            <div class="col-md-8 form-group">                            
                                <textarea name="acc_description" class="form-control" placeholder="Accident Description" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="acc_outcome">Accident Outcome :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" name="acc_outcome" required>
                                   <option value="Injury">Injury</option>
                                   <option value="Death">Death</option>
                                   <option value="Illness">Illness</option>
                                   <option value="Not Recorded">Not Recorded</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Agency of Accident</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="acc_agency">Accident Agency :</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" name="acc_agency" required>
                                    @foreach ($accidentagencies as $accidentagency )
                                        <option value="{{ $accidentagency->id }}">{{ $accidentagency->acc_agency }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Injury</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inj_nature">Nature of Injury :</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-select" name="inj_nature" required>
                                    @foreach ($injurynatures as $injurynature )
                                        <option value="{{ $injurynature->id }}">{{ $injurynature->inj_nature }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="doc_name">Medical Practitioner Name:</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="doc_name" class="form-control" type="text" placeholder="Doctor's Name treating the injured workman" required/>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="hospital_name">Hospital / Medical Clinic Name :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="hospital_name" class="form-control" type="text" placeholder="Hospital / Clinic Name" required/>  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="action_taken">Action Taken :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <textarea name="action_taken" class="form-control" rows="3" required></textarea>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="inj_location">Location of Injury :</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-select" name="inj_location" required>
                                    @foreach ($injurylocations as $injurylocation )
                                        <option value="{{ $injurylocation->id }}">{{ $injurylocation->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="lost_days">Days Lost :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="lost_days" class="form-control" type="number" placeholder="Number of days lost due to injury" required/>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Gross Weekly Earnings at the Date of Accident</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="weekly_wage">Weekly Gross Cash Wage:</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="weekly_wage" id="wgcw" class="form-control" type="number" step="0.01" required/>  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="weekly_ration">Value of Rations :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="weekly_ration" id="vor" class="form-control" type="number" step="0.01" />  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="weekly_housing">Value of Housing:</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="weekly_housing" id="voh" class="form-control" type="number" step="0.01" />  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="weekly_fuel">Value of Fuel :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="weekly_fuel" id="vof" class="form-control" type="number" step="0.01" />  
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="weekly_overtime">Overtime payment or other special remuneration for work done, whether by way of bonus or otherwise, if of constant character, and for work habitually performed :</label>
                            </div>
                            <div class="col-md-6 form-group">                            
                                <input name="weekly_overtime" id="overtime" class="form-control" type="number" step="0.01" />  
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="weekly_gross">Total Gross Weekly Earnings :</label>
                            </div>
                            <div class="col-md-6 form-group">                            
                                <input name="weekly_gross" id="tgwe" class="form-control" type="number" step="0.01" required/>  
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <label for="effective_date">Work Effective Date :</label>
                            </div>
                            <div class="col-md-6 form-group">                            
                                <input name="effective_date" class="form-control" type="date" required/>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Payout Details</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="temp_incapacity_amt">Temporary Incapacity Amount :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="temp_incapacity_amt" id="tia" class="form-control" type="number" step="0.01" />  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="temp_incapacity_med">Temporary Incapacity Medical :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="temp_incapacity_med" id="tim" class="form-control" type="number" step="0.01" />  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="temp_incapacity_trnpt">Temporary Incapacity Transport :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="temp_incapacity_trnpt" id="tit" class="form-control" type="number" step="0.01" />  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="permnt_partial_incapacity">Permanent Partial Incapacity :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="permnt_partial_incapacity" id="ppi" class="form-control" type="number" step="0.01" />  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="permnt_total_incapacity">Permanent Total Incapacity :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="permnt_total_incapacity" id="pti" class="form-control" type="number" step="0.01" />  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="occ_disease">Occupational Disease :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="occ_disease" class="form-control" id="disease" type="number" step="0.01" />  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="death">Death :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="death" class="form-control" id="death" type="number" step="0.01" />  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="total_comp_amt">Total Compensation Amount :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="total_comp_amt" class="form-control" id="tca" type="number" step="0.01" required />  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="add_notes">Additional Notes :</label>
                            </div>
                            <div class="col-md-9 form-group">                            
                                <textarea name="add_notes" class="form-control" rows="3"></textarea>
                            </div>
                        
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-4 text-primary">Administrative Details</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="asn">Accident Serial Number :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="asn" class="form-control" type="text" required/>  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="station">Station :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="station" class="form-control" type="text" required/>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="officer">Officer Responsible :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="officer" class="form-control" type="text" required/>  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="status">Status :</label>
                            </div>
                            <div class="col-md-3 form-group">   
                                <select name="status" class="form-select" required>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="entered_by">Formed completed by :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="entered_by" class="form-control" type="text" value="{{ $user }}" disabled/>  
                            </div>
                        
                            <div class="col-md-3">
                                <label for="date_entered">Date :</label>
                            </div>
                            <div class="col-md-3 form-group">                            
                                <input name="date_entered" class="form-control" type="text" value="{{ $currenttime->format('jS, F Y h:i:s A') }}" disabled/>  
                            </div>
                        </div>


                        <div class="row"> 
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Save</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
$(document).ready(function(){  

    // To calculate total compensation amount
    var tia = 0;
    var tit = 0;
    var tim = 0;
    var ppi = 0; 
    var pti = 0;
    var disease = 0; 
    var death = 0; 

   $('#tia').on('input', function(){  
        tia = $(this).val();
       calculate();
    });

    $('#tit').on('input', function(){  
       tit = $(this).val();
       calculate();
    });
    $('#tim').on('input', function(){  
        tim = $(this).val();
       calculate();
    });

    $('#ppi').on('input', function(){  
       ppi = $(this).val();
       calculate();
    });
    $('#pti').on('input', function(){  
        pti = $(this).val();
       calculate();
    });

    $('#disease').on('input', function(){  
       disease = $(this).val();
       calculate();
    });
    $('#death').on('input', function(){  
        death = $(this).val();
       calculate();
    });
    
    $('#tca').on('focus', function(e) {
    	calculate();
    })
    
    function calculate() {
    	$('#tca').val(parseInt(tia) + parseInt(tit) + parseInt(tim) + parseInt(ppi) + parseInt(pti) + parseInt(disease) + parseInt(death));
    }

    
    // To calculate weekly gross amount
    var wgcw = 0;
    var vor = 0;
    var voh = 0;
    var vof = 0; 
    var overtime = 0;

   $('#wgcw').on('input', function(){  
        wgcw = $(this).val();
       calculateG();
    });

    $('#vor').on('input', function(){  
       vor = $(this).val();
       calculateG();
    });
    $('#voh').on('input', function(){  
        voh = $(this).val();
        calculateG();
    });

    $('#vof').on('input', function(){  
       vof = $(this).val();
       calculateG();
    });
    $('#overtime').on('input', function(){  
        overtime = $(this).val();
        calculateG();
    });
    
    $('#tgwe').on('focus', function(e) {
    	calculateG();
    })
    
    function calculateG() {
    	$('#tgwe').val(parseInt(wgcw) + parseInt(vor) + parseInt(vof) + parseInt(voh) + parseInt(overtime));
    }

 });

 </script>
