@extends('layouts.app')

@section('title', 'Print Report')

<style>
.inv {
height:60px;    
}

.ref { 
    font-size: 10px;
    }

h3 {
    padding: 10px;
}
.revised {
    font-weight: bold; 
}
.channels {
    float: left;
    margin-left: 5em;
}
.logo-align {
    float: right;
    margin-right: 5em;
}


</style>

@section('content') 

        <div class="row text-center">
            <div class="col-md-12">
                <div class="card-box">
                        <div class="channels">
                            <img src="/admin/assets/img/rcl_logo.png" height="65">  
                        </div> 
                        <div class="logo-align">
                            <img src="/admin/assets/img/logo.png" height="80">
                        </div>  
                        <h3 class="text-center">
                            <strong> Incident and Injury Investigation Report</strong>
                        </h3>
                </div>
            <div>
        <div>
<br>
<div class="container">
<h6 class="ref text-left">RCL-HSE-FM-01.2 - Version 1.1 Rev. Nov 2020</h6> 
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="12%">Name of Employee</td>
                                                    <td class="align-middle text-left" width="40%">{{ $reports->incident->involved }}</td>
                                                    <td class="align-middle text-left revised" width="14%">Actual Severity</td>
                                                    <td class="align-middle text-center" width="3%">{{ $reports->incident->severity }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="23%">Safety Awareness Training Date</td>
                                                    <td class="align-middle text-left" width="12%">@if($reports->safety != ''){{ date('M-d-Y', strtotime($reports->safety)) }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="13%">Training Topic</td>
                                                    <td class="align-middle text-left">@if($reports->proof_training != ''){{ $reports->proof_training }}@else<p class="text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="17%">Worst Potential Severity</td>
                                                    <td class="align-middle text-center" width="3%">{{ $reports->incident->wps }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="16%">Name of Line Manager</td>
                                                    <td class="align-middle text-left" width="37%">{{ $reports->manager->name }}</td>
                                                    <td class="align-middle text-left revised" width="10%">Badge No.</td>
                                                    <td class="align-middle text-left">{{ $reports->manager->badge }}</td>
                                                    <td class="align-middle text-left revised" width="9%">Profession/Designation</td>
                                                    <td class="align-middle text-left">{{ $reports->manager->designation }}</td>
                                                </tr>
                                                <tr>
                                                <td class="align-middle text-left revised" width="16%">Name of Supervisor</td>
                                                    <td class="align-middle text-left" width="37%">{{ $reports->supervisor->name }}</td>
                                                    <td class="align-middle text-left revised" width="10%">Badge No.</td>
                                                    <td class="align-middle text-left" width="10%">{{ $reports->supervisor->badge }}</td>
                                                    <td class="align-middle text-left revised" width="9%">Category</td>
                                                    <td class="align-middle text-left">{{ $reports->incident->inc_category }}</td>
                                                </tr>
                                                </tbody>
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle text-left revised" width="16%">Division/Department</td>
                                                        <td class="align-middle text-left">{{ $reports->location->division }}</td>
                                                        <td class="align-middle text-left revised" width="15%">Project Name</td>
                                                        <td class="align-middle text-left">{{ $reports->location->name }}</td>
                                                        <td class="align-middle text-left revised" width="12%">Location</td>
                                                        <td class="align-middle text-left">{{ $reports->location->loc_name }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle text-left revised" width="20%">Place of the Incident/Injury</td>
                                                        <td class="align-middle text-left">{{ $reports->inc_loc }}</td>
                                                        <td class="align-middle text-left revised" width="15%">Date of Incident</td>
                                                        <td class="align-middle text-left">{{ date('M-d-Y', strtotime($reports->incident->date)) }}</td>
                                                        <td class="align-middle text-left revised" width="12%">Time of Incident</td>
                                                        <td class="align-middle text-left">{{ date('h:i a', strtotime($reports->incident->date)) }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="23%">Nature of the Incident/Injury</td>
                                                    <td class="align-middle text-left" width="14%">{{ $reports->nature }}</td>
                                                    <td class="align-middle text-left revised" width="18%">Other, Please specify:</td>
                                                    <td class="align-middle text-left">{{ $reports->other }}</td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle revised" width="25%">Brief Description of the Incident/Injury</td>
                                                    <td class="align-middle text-justify">{{ $reports->description }}</td>
                                                </tr>   
                                                </tr>
                                                    <td class="align-middle revised" width="25%">Details of the Injury (Specify affected body parts)</td>
                                                    <td class="align-middle text-justify">{{ $reports->details }}</td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="15%">First Aid Given?</td>
                                                    <td class="align-middle text-left" width="10%">{{ $reports->aid }}</td>
                                                    <td class="align-middle text-left revised" width="15%">Name of First Aider</td>
                                                    <td class="align-middle text-left">{{ $reports->nurse->badge }} - {{ $reports->nurse->name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="25%">Name of Hospital where patient was treated/transferred</td>
                                                    <td class="align-middle text-left" width="25%">@if($reports->hospital != ''){{ $reports->hospital }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="15%">Address/Location of the Hospital</td>
                                                    <td class="align-middle text-left">@if($reports->hos_addr != ''){{ $reports->hos_addr }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="43%">Medical leave given by administering Hospital/Clinic or Doctor</td>
                                                    <td class="align-middle text-left" width="8%">{{ $reports->med_leave }}</td>
                                                    <td class="align-middle text-left revised" width="15%">Number of Days</td>
                                                    <td class="align-middle text-left" width="8%">@if($reports->leave_days != ''){{ $reports->leave_days }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="12%">Hospitalization</td>
                                                    <td class="align-middle text-left">{{ $reports->hosp }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="15%">Property Damage</td>
                                                    <td class="align-middle text-left" width="8%">{{ $reports->prop_dam }}</td>
                                                    <td class="align-middle text-left revised" width="25%">Estimated percentage of damage</td>
                                                    <td class="align-middle text-left" width="8%">@if($reports->est_dam != ''){{ $reports->est_dam }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="25%">Estimated Cost of damaged (SAR)</td>
                                                    <td class="align-middle text-left">@if($reports->est_amt != ''){{ $reports->est_amt }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-left"><h6>Property Details</h6></div>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="8%">Type/Function of the property</td>
                                                    <td class="align-middle text-left" width="15%">@if($reports->property != ''){{ $reports->property }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="8%">Location of affected property</td>
                                                    <td class="align-middle text-left" width="15%">@if($reports->prop_loc != ''){{ $reports->prop_loc }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="12%">Model of the property</td>
                                                    <td class="align-middle text-left" width="8%">@if($reports->prop_model != ''){{ $reports->prop_model }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="12%">Plate Number</td>
                                                    <td class="align-middle text-left" width="8%">@if($reports->prop_plate != ''){{ $reports->prop_plate }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="12%">Vehicle Registration Number</td>
                                                    <td class="align-middle text-left" width="8%">@if($reports->prop_reg != ''){{ $reports->prop_reg }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                    <td class="align-middle text-left revised" width="12%">Company Fleet Number</td>
                                                    <td class="align-middle text-left" width="8%">@if($reports->prop_rte != ''){{ $reports->prop_rte }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="22%">Was Pre-Task/Toolbox meeting conducted</td>
                                                    <td class="align-middle text-left" width="5%">{{ $reports->toolbox }}</td>
                                                    <td class="align-middle text-left revised" width="30%">Was the person using required Personal Protective Equipment (PPE)</td>
                                                    <td class="align-middle text-left" width="5%">{{ $reports->ppe }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="50%">Specify the Personal Protective Equipment (PPE)</td>
                                                    <td class="align-middle text-left">@if($reports->ppe_equip != ''){{ $reports->ppe_equip }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="35%">What was the injured person/employee doing at the time of the incident?</td>
                                                    <td class="align-middle text-left">{{ $reports->emp_doing }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="35%">What was the machine/equipment doing at the time of the incident?</td>
                                                    <td class="align-middle text-left">{{ $reports->emp_machine }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="35%">What was the material(s)/substance(s) doing at the time of the incident?</td>
                                                    <td class="align-middle text-left">{{ $reports->emp_material }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="25%">Immediate cause(s) of the incident/injury</td>
                                                    <td class="align-middle text-justify">{{ $reports->imm_cause }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="15%">Root cause(s) of the incident/injury</td>
                                                    <td class="align-middle text-left">
                                                    @foreach($output as  $item)
                                                    <li>{{ $loop->iteration }}. {!! $item->type !!}: {!! $item->root_name !!}</li>
                                                    @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="15%">Corrective Action to prevent reoccurence</td>
                                                    <td class="align-middle text-left">
                                                    @foreach($output as  $item)
                                                    <li>{{ $loop->iteration }}. {!! $item->rec_type !!}: {!! $item->rec_name !!} (Status: 
                                                    @if($item->status == 0)
                                                        On Going 
                                                        @else
                                                        Done
                                                    @endif
                                                        )</li>
                                                    @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="25%">Were there any witnesses?</td>
                                                    <td class="align-middle text-left" width="15%">{{ $reports->witness }}</td>
                                                    <td class="align-middle text-left revised" width="25%">Type of witness(es)</td>
                                                    <td class="align-middle text-left">@if($reports->ppe_equip != ''){{ $reports->ppe_equip }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="20%">Witness Details</td>
                                                    <td class="align-middle text-left">@if($reports->wit_details != ''){{ $reports->wit_details }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-left revised" width="15%">Witness Statement</td>
                                                    <td class="text-justify">@if($reports->wit_statement != ''){{ $reports->wit_statement }}@else<p class="align-middle text-center"> - </p>@endif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="40%">Initial Investigation Conducted by:</th>
                                                    <th width="40%">Noted by:</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="inv">
                                                    <td class="align-middle text-left">{{ $reports->officer->badge }} - {{ $reports->officer->name }}</td>
                                                    <td class="align-middle" width="12%"></td>
                                                    <td class="align-middle text-left">{{ date('M-d-Y', strtotime($reports->incident->date)) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Additional Details:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                @if(!empty($reports->proof))
                                                @foreach ($photos as $photo)
                                                    <td>
                                                        <img src="{{url('../')}}/files/thumbnail/{{ $photo ? $photo : 'no_image.jpg' }}" class="img-fluid img-thumbnail" alt="" width="200%" height="200%">
                                                    </td>
                                                    @endforeach
                                            @endif  
                                            </tr> 
                                            <tr>
                                                @if(!empty($reports->inc_img))
                                                @foreach ($images as $image)
                                                    <td>
                                                        <img src="{{url('../')}}/files/thumbnail/{{ $image ? $image : 'no_image.jpg' }}" class="img-fluid img-thumbnail" alt="" width="200%" height="200%">
                                                    </td>
                                                    @endforeach
                                            @endif   
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="40%">Investigation Report Verified by:</th>
                                                    <th width="40%">Noted by:</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="inv">
                                                    <td class="align-middle"></td>
                                                    <td class="align-middle" width="12%"></td>
                                                    <td class="align-middle text-left">{{ date('M-d-Y', strtotime($reports->created_at)) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        </div>


                                        <div class="text-center d-print-none">
                                            <a href="javascript:window.print()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            Print</a>
                                        </div>
</div>

<script>
    function myFunction() {
        window.print();
    }
</script>


@endsection