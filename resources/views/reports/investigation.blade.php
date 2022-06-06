@extends('layouts.master')

@section('title', 'Investigation Report')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Investigation Report</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Incident ID</th>
                                                <th>Employees Name</th>
                                                <th>Safety Awareness Training Date</th>
                                                <!-- <th>Proof of Training</th> -->
                                                <th>Line Manager</th>
                                                <th>Supervisor</th>
                                                <th>Place of Incident</th>
                                                <th>Nature of Incident</th>
                                                <th>Brief Description</th>
                                                <th>Details of the Injury</th>
                                                <th>First Aid Given</th>
                                                <th>Name of First Aider</th>
                                                <th>Hospital's Name</th>
                                                <th>Hospital's Address</th>
                                                <th>Medical Leave Given</th>
                                                <th>No. of Days</th>
                                                <th>Property Damage</th>
                                                <th>Estimated Percentage</th>
                                                <th>Estimated Cost of Damage</th>
                                                <th>Type/Function of Property</th>
                                                <th>Location of Affected Property</th>
                                                <th>Manufacturer's Name</th>
                                                <th>Model</th>
                                                <th>Plate Number</th>
                                                <th>Vehicles Registration</th>
                                                <th>Company Fleet No.</th>
                                                <th>Was Pre-Task/Toolbox Meeting Conducted</th>
                                                <th>Was the Person Using Required PPE</th>
                                                <th>Specify the Personal Protective Equipment (PPE)</th>
                                                <th>What was the injured person/employee doing at the time of the incident?</th>
                                                <th>What was the machine/equipment doing at the time of the incident?</th>
                                                <th>What was the material/s / substance/s doing at the time of the incident</th>
                                                <th>Immediate Cause/s of the Incident/injury</th>
                                                <th>Root Cause(s) and Recommendation of Incident/injury</th>
                                                <th>Were there any witnesses?</th>
                                                <th>Type of witness/s</th>
                                                <th>Witness Details</th>
                                                <th>Witness Statement</th>
                                                <th>Created by</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                                @foreach ($reports as $report)
                                            <tr>
                                                <td>{{ $report->id }}</td>
                                                <td>{{ $report->incident_id }}</td>
                                                <td>{{ $report->officer->badge }} - {{ $report->officer->name }} ({{ $report->officer->designation }})</td>
                                                <td>{{ $report->safety }}</td>
                                                <td>{{ $report->manager->badge }} - {{ $report->manager->name }} ({{ $report->manager->designation }})</td>
                                                <td>{{ $report->supervisor->badge }} - {{ $report->supervisor->name }} ({{ $report->supervisor->designation }})</td>
                                                <td>{{ $report->inc_loc }}</td>
                                                <td>{{ $report->nature }}</td>
                                                <td>{{ $report->description }}</td>
                                                <td>{{ $report->details }}</td>
                                                <td>{{ $report->aid }}</td>
                                                <td>{{ $report->nurse->badge }} - {{ $report->nurse->name }} ({{ $report->nurse->designation }})</td>
                                                <td>{{ $report->hospital }}</td>
                                                <td>{{ $report->hos_addr }}</td>
                                                <td>{{ $report->med_leave }}</td>
                                                <td>{{ $report->leave_days }}</td>
                                                <td>{{ $report->prop_dam }}</td>
                                                <td>{{ $report->est_dam }}</td>
                                                <td>{{ $report->est_amt }}</td>
                                                <td>{{ $report->property }}</td>
                                                <td>{{ $report->prop_loc }}</td>
                                                <td>{{ $report->prop_manuf }}</td>
                                                <td>{{ $report->prop_model }}</td>
                                                <td>{{ $report->prop_plate }}</td>
                                                <td>{{ $report->prop_reg }}</td>
                                                <td>{{ $report->prop_rte }}</td>
                                                <td>{{ $report->toolbox }}</td>
                                                <td>{{ $report->ppe }}</td>
                                                <td>{{ $report->ppe_equip }}</td>
                                                <td>{{ $report->emp_doing }}</td>
                                                <td>{{ $report->emp_machine }}</td>
                                                <td>{{ $report->emp_material }}</td>
                                                <td>{{ $report->imm_cause }}</td>
                                                <td>
                                                @foreach($output as  $item)
                                                        <li>{!! $item->root_name !!} - {!! $item->type !!} - {!! $item->rec_name !!}</li>
                                                @endforeach
                                                </td>
                                                <td>{{ $report->witness }}</td>
                                                <td>{{ $report->wit_type }}</td>
                                                <td>{{ $report->wit_details }}</td>
                                                <td>{{ $report->wit_statement }}</td>
                                                <td>{{ $report->user->name }}</td>
                                            </tr>
                                           
                                            @endforeach
                                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>


@endsection