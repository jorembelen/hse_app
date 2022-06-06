@extends('layouts.master')

@section('title', 'Summary')
@section('content') 
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                    <thead>
                        <tr>
                                        <th>Invest. ID</th>
                                        <th>Notif. ID</th>
                                        <th>Incident Type</th>
                                        <th>Description</th>
                                        <th>Project Name</th>
                                        <th>WPS</th>
                                        <th>Severity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($reports as $report)
                                    <tr>
                                    <td>{{ $report->id }}</td>
                                        <td>{{ $report->incident_id }}</td>
                                        <td>{{ $report->incident->type }}</td>
                                        <td>{{ Str::limit($report->description, 200) }}</td>
                                        <td>{{ $report->location->name }}</td>
                                        <td>{{ $report->incident->wps }}</td>
                                        <td>{{ $report->incident->severity }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                    <a class="dropdown-item" href="{{ route('reports.show', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                                                    View</a>
                                            @if($report->remarks != 0)
                                                @if(auth()->user()->role != 'user')
                                                    <a class="dropdown-item" role="button" href="{{ route('remarks.view', $report->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                                    View Remarks</a>
                                                @endif
                                            @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                    @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection