@extends('layouts.master')

@section('title', 'Recommendations List')
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
                                        <th>SN</th>
                                        <th>Notification ID</th>
                                        <th>Investigation ID</th>
                                        <th>Root Cause</th>
                                        <th>Type</th>
                                        <th>recommendation</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        @if(auth()->user()->role == 'user' || auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($cause as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->incident_id }}</td>
                                        <td>
                                            <a class="bs-tooltip" title="Click to view the Report!" href="{{ route('reports.show' , $item->report_id) }}"><span class="badge outline-badge-danger">{{ $item->report_id }}</span></a>
                                            
                                        </td>
                                        <td>{{ $item->root_name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->rec_name }}</td>
                                        <td>{{ $item->rec_type }}</td>
                                        <td>
                                            @if($item->status == 0)
                                            <span class="badge badge-danger">On Going</span>
                                            @else
                                            <span class="badge badge-info">Done</span>
                                            @endif
                                        </td>
                                        @if(auth()->user()->role == 'user' || auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                @if(auth()->user()->role == 'user' || auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                                                    <a class="dropdown-item" href="{{ route('recommendations.edit', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                    Edit</a>
                                                </div>
                                                @endif
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                   
                                    @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>               
     
@foreach ($cause as $item)
        <!-- Delete -->
        <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="exampleStandardModalLabel"><i class="align-middle mr-2 far fa-fw fa-frown"></i> Delete this record?</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body m-3">
                    <form class="form-horizontal" method="POST" action="{{ route('recommendations.destroy', $item->id) }}">
                        @csrf
                            {{ method_field('DELETE') }}
                    <h5 class="mb-0 text-center">If you delete the data it will be gone forever. Are you sure you want to proceed?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Delete</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
                </div>
              </div>
            </div>
          </div>
@endforeach

@endsection

