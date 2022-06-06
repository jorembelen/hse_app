@extends('layouts.master')

@section('title', 'Create Vaccine')
@section('content') 

<div class="row layout-top-spacing">
                 <div class="col-lg-3"></div>

    <div id="basic" class="col-lg-6 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add Vaccination</h4>
                    </div>                 
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="row">
                    <div class="col-lg-12 col-12 mx-auto">
                        <form class="form-horizontal" method="POST" action="{{ route('vaccines.store') }}" >
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employees Name</label>
                                <div class="col-xl-9 col-lg-9 col-sm-10">
                                          <select name="employee_id" class="form-control col-8 basic" data-live-search="true"  >
                                            <option value="">Select</option>
                                            @foreach( $employees as $employee)
                                            <option value="{{$employee->id}}"  @if (old('employee_id') == $employee->id ) selected="selected" @endif>{{$employee->badge}} - {{$employee->name}} ({{$employee->designation}}) </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Location</label>
                                <div class="col-xl-9 col-lg-9 col-sm-10">
                                          <select name="location_id" class="form-control col-8 basic" data-live-search="true"  >
                                            <option value="">Select</option>
                                            @foreach( $locations as $location)
                                            <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}} - {{$location->loc_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Vaccine Schedule</label>
                                <div class="col-xl-9 col-lg-9 col-sm-10">
                                    <select name="name" class="form-control col-8 basic"  >
                                        <option value="">Select</option>
                                        <option value="first shot">First Shot</option>
                                        <option value="second shot">Second Shot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="hEmail" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Date</label>
                                <div class="col-xl-9 col-lg-9 col-sm-10">
                                    <input type="date" id="basicFlatpickr" name="date" class="form-control flatpickr flatpickr-input active" placeholder="date">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                <a href="{{ \URL::previous() }}" type="button" class="btn btn-danger waves-effect">Cancel</a>
                            </div>
                    </form>

                    </div>                                        
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>  
</div>
@endsection