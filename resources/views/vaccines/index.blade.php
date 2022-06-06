@extends('layouts.master')

@section('title', 'Vaccine')
@section('content') 
 
                        
<div class="row layout-top-spacing" id="cancel-row">
                              
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                                    <a href="{{ route('vaccines.create') }}" type="button"class="btn btn-primary mb-2 float-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        Create
                                    </a>
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Vaccinations List</h4>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Vaccine</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vaccines as $vaccine)
                                    <tr>
                                        <td>{{ $vaccine->id }}</td>
                                        <td>{{ $vaccine->employee->name }}</td>
                                        <td>{{ $vaccine->location->loc_name }}</td>
                                        <td>{{ $vaccine->name }}</td>
                                        <td>{{ $vaccine->date }}</td>
                                        <td class="text-center">
                                        <a role="button" data-toggle="modal" data-target="#edit{{$vaccine->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><polyline points="3 6 5 6 21 6"></polyline><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                        <a role="button" data-toggle="modal" data-target="#delete{{$vaccine->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                                     <!-- Modal -->
                                     <div class="modal fade register-modal" id="create" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
  
                                            <div class="modal-header" id="registerModalLabel">
                                              <h4 class="modal-title">Add</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                            <div class="modal-body">
                                              <form class="mt-0" method="POST" action="{{ route('vaccines.store') }}" id="vaccines-create">
                                               @csrf
                                                            <div class="form-group">
                                                                <label for="employee_id">Safety Officer<span class="text-danger"> * </span></label>
                                                            <select name="employee_id" class="form-control basic" data-live-search="true"  >
                                                                        <option value="">Select</option>
                                                                        @foreach( $officers as $officer)
                                                                        <option value="{{$officer->id}}"  @if (old('employee_id') == $officer->id ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}}) </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                      </div>
                                                      <div class="form-group">
                                                      <input type="text" class="form-control mb-2" name="name" value="{{ old('name') }}" placeholder="Name">
                                                      </div>
                                                      <div class="form-group">
                                                      <input type="text" class="form-control mb-2" name="designation" value="{{ old('designation') }}" placeholder="Designation">
                                                      </div>
                                                          <div class="modal-footer justify-content-between">
                                                              <button type="submit" class="btn btn-primary">Submit</button>
                                                              <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                          </div>
                                              </form>
  
  
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>

@endsection