@extends('layouts.master')

@section('title', 'Notification')
@section('content') 
 
                        
                      
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                 
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Notification Report</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
    
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Incident Type</th>
                                    <th>Incident Category</th>
                                    <th>Insurance</th>
                                    <th>Person Involved</th>
                                    <th>Safety Officer</th>
                                    <th>Designation</th>
                                    <th>Project Name</th>
                                    <th>Injured Body Parts</th>
                                    <th>Type of Injury</th>
                                    <th>Immediate Cause</th>
                                    <th>Equipment Involved</th>
                                    <th>Description</th>
                                    <th>Immediate Action</th>
                                    <th>WPS</th>
                                    <th>Severity</th>
                                    <th>Date & Time of Incident</th>
                                    <th>Date Submitted</th>
                                    <th>Created by</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($incidents as $incident)
                                <tr>
                                    <td>{{ $incident->id }}</td>
                                    <td>
                                        <a href="{{ route('incidents.show', $incident->id) }}">{{ $incident->type }}</a>
                                    </td>
                                    <td>{{ $incident->inc_category }}</td>
                                    <td>{{ $incident->insurance }}</td>
                                    <td>{{ $incident->involved }}</td>
                                    <td>{{ $incident->officer->name }}</td>
                                    <td>{{ $incident->officer->designation }}</td>
                                    <td>{{ $incident->locations->name }}</td>
                                    <td>{{ $incident->injury_location }}</td>
                                    <td>{{ $incident->injury_sustain }}</td>
                                    <td>{{ $incident->cause }}</td>
                                    <td>{{ $incident->equipment }}</td>
                                    <td>{{ $incident->description }}</td>
                                    <td>{{ $incident->action }}</td>
                                    <td>{{ $incident->wps }}</td>
                                    <td>{{ $incident->severity }}</td>
                                    <td>{{ date('M-d-Y', strtotime($incident->date)) }}, {{ date('h:i a', strtotime($incident->time)) }}</td>
                                    <td>{{ date('M-d-Y, h:i a', strtotime($incident->created_at)) }}</td>
                            
                                    <td>{{ $incident->user->name }}</td>
                                </tr>
                            
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection