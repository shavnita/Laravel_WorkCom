

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Accident Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-6 text-black">Workman</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="workman_name">Wokrman Name :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->workman_name }}</label>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="workman_sex">Gender :</label>
                            </div>
                            <div class="col-md-7 form-group">                            
                                <label class="text-primary">{{ $notification->workman_gender }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="workman_age">Age :</label>
                            </div>
                            <div class="col-md-7 form-group">    
                                <label class="text-primary">{{ $notification->workman_age }}</label>                        
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="occupation">Occupation :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->workman_occupation}}</label>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="address">Residential Address :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->workman_address }}</label>
                                
                            </div>
                        </div>
                        {{ $employers[0]->industry_id }}

                    <form action="{{ route('notification.update', $notification) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-6 text-black">Employer</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="empname">Employer Name :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $employers[0]->emp_name  }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="empname">Employer Address :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $employers[0]->emp_address  }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="empname">Employer Industry :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $industries[0]->name  }}</label>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-6 text-black">Accident Particulars</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="acc_time">Date and Hour :</label>
                            </div>
                            <div class="col-md-7 form-group">
                             
                            <label class="text-primary">{{ $notification->accident_time  }}</label>
                                      
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="acc_place">Accident Place :</label>
                            </div>
                            <div class="col-md-7 form-group">

                                <label class="text-primary">{{ $accidentplaces[0]->acc_place }}</label>
                                    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="acc_description">Accident Description :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->accident_information  }}</label>                          
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="acc_outcome">Accident Outcome :</label>
                            </div>
                            <div class="col-md-7 form-group">

                                <label class="text-primary">{{ $notification->accident_outcome  }}</label>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="acc_agency">Accident Agency :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $accidentagencies[0]->acc_agency }}</label>                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="inj_nature">Nature of Injury :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $injurynatures[0]->inj_nature }}</label> 
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="inj_location">Location of Injury :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $injurylocations[0]->name }}</label> 
                                
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="col-md-5">
                                <label for="doc_name">Medical Practitioner Name:</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->doctor_name }}</label>                          
                                 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="hospital_name">Hospital / Medical Clinic Name :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->hospital_name  }}</label>                           
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="action_taken">Action Taken (Treatment) :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->action_taken }}</label>                          
                            </div>
                        </div>

                        <div class="row">                                                    
                            <div class="col-md-5">
                                <label for="lost_days">Days Lost :</label>
                            </div>
                            <div class="col-md-7 form-group">   
                                <label class="text-primary">{{ $notification->days_lost }}</label>                         
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-6 text-black">Renumeration (Weekly)</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="weekly_wage">Weekly Gross Wage:</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->weekly_wage  }}</label>                          
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="weekly_ration">Weekly Rations :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->weekly_ration }}</label>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="weekly_housing">weekly Housing:</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->weekly_housing }}</label>                            
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="weekly_fuel">Weekly Fuel :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->weekly_fuel }}</label>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="weekly_overtime">Weekly Overtime :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->weekly_overtime }}</label>                          
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="weekly_gross">Total Gross Weekly :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->weekly_gross  }}</label>                           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="effective_date">Work Effective Date :</label>
                            </div>
                            <div class="col-md-7 form-group">   
                                <label class="text-primary">{{ $notification->effective_date }}</label>                         
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-6 text-black">Payout Details</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="temp_incapacity_amt">Temporary Incapacity Amount :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->temp_incapacity_amout }}</label>                          
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="temp_incapacity_med">Temporary Incapacity Medical :</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <label class="text-primary">{{ $notification->temp_incapacity_medical }}</label>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="temp_incapacity_trnpt">Temporary Incapacity Transport :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->temp_incapacity_transport  }}</label>                           
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="permnt_partial_incapacity">Permanent Partial Incapacity :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->permanent_partial_incapacity }}</label>                           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="permnt_total_incapacity">Permanent Total Incapacity :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->permanent_total_incapacity }}</label>                           
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="occ_disease">Occupational Disease :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->occupational_disease }}</label>                           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="death">Death :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->death }}</label>                          
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="total_comp_amt">Total Compensation Amount :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->total_compensation_amount }}</label>                           
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="add_notes">Additional Notes :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->extra_notes }}</label>                           
                            </div>
                        
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="divider">
                                    <div class="divider-text fs-6 text-black">Administrative Details</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="asn">Accident Serial Number :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->accident_serial_number }}</label>                          
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="station">Station :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->station }}</label>                           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="officer">Officer Responsible :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->officer_responsible }}</label>                          
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="status">Status :</label>
                            </div>
                            <div class="col-md-7 form-group">                            
                                <label class="text-primary">{{ $statuses[0]->status }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="entered_by">Formed completed by :</label>
                            </div>
                            <div class="col-md-7 form-group">     
                                <label class="text-primary">{{ $notification->entered_by }}</label>                       
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="date_entered">Submitted date :</label>
                            </div>
                            <div class="col-md-7 form-group"> 
                                <label class="text-primary">{{ $notification->entered_date }}</label>                           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="updated_by">Formed updated by :</label>
                            </div>
                            <div class="col-md-7 form-group">  
                                <label class="text-primary">{{ $notification->updated_by }}</label>                          
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-5">
                                <label for="date_updated">Updated Date :</label>
                            </div>
                            <div class="col-md-7 form-group">   
                                <label class="text-primary">{{ $notification->updated_date }}</label>                         
                            </div>
                        </div>

                        <div class="row mt-4">
                            
                            <div class="col-sm-12 d-flex justify-content-start">
                            <a href="{{ route('notification.edit', $notification) }}"><button type="button"
                                    class="btn btn-primary me-1 mb-1">Edit Record</button></a>
                                
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="divider">
                                        <div class="divider-text fs-6 text-black">Accident Updates</div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped mt-1 " id="table1">
                                <thead class="border-top">
                                    <tr>
                                        <th>Accident #</th>
                                        <th>Action Type</th>
                                        <th>Remarks</th>
                                        <th>User</th>
                                        <th>Date Updated</th>
                                        <th colspan="2">Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($updates as $update )
                                    <tr>
                                        <td>{{ $update->notification->accident_serial_number }} - {{ $update->notification->workman_name }}</td>
                                        <td>{{ $update->updatestatus->action_type }}</td>
                                        <td>{{ $update->remarks}}</td>
                                        <td>{{ $update->username }}</td>
                                        <td>{{ $update->update_date }}</td>
                                        <td><a href="{{ route('updates.edit', $update) }}" class="btn btn-secondary rounded-pill float-start me-3">Edit</a></td>
                                        <td>
                                            <form action="{{ route('updates.destroy', $update )}}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger rounded-pill">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
