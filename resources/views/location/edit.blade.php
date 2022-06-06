@extends('layouts.master')

@section('title', 'Update Location')
@section('content') 

<div class="row">
    <div class="col-3"></div>
<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <form class="mt-0 form-disabled-button" method="POST" action="{{ route('locations.update', $location->id) }}" id="loc-create">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Division</label>
                            <div class="col-md-11 ml-3">
                              <input type="text" class="form-control mb-2" value="{{$location->division}}" name="division"  placeholder="Division/Department">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-username" class="col-md-4 ml-3 col-form-label">Project Name</label>
                            <div class="col-md-11 ml-3">
                              <input type="text" class="form-control mb-2" value="{{$location->name}}" name="name" placeholder="Project Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Location</label>
                            <div class="col-md-11 ml-3">
                              <input type="text" class="form-control mb-4" value="{{$location->loc_name}}" name="loc_name" placeholder="Location">
                            </div>
                        </div>
              
                </div>
                <div class="modal-footer">
                    <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                    <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                    <a href="{{ \URL::previous() }}" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
        </div>
    </div>
</div>
<div class="col-3"></div>
</div>
@endsection