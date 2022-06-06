@extends('layouts.master')

@section('title', 'Remarks')
@section('content') 
 
                        
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ \URL::previous() }}" type="button"class="btn btn-dark mb-2 float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                    Back
                </a> 
            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
                    <thead>
                        <tr>
                                        <th>Invest. ID</th>
                                        <th>Notif. ID</th>
                                        <th>Remarks</th>
                                        <th>Notes</th>
                                        <th>Created by</th>
                                        <th>Created At</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($remarks as $remark)
                                    <tr>
                                        <td>{{ $remark->incident_id }}</td>
                                        <td>{{ $remark->report_id }}</td>
                                        <td>{{ $remark->status }}</td>
                                        <td>{{ $remark->note }}</td>
                                        <td>{{ $remark->user->name }}</td>
                                        <td>{{ date('M-d-Y h:i a', strtotime($remark->created_at)) }}</td>
                                    </tr>
                                   
                                    @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection