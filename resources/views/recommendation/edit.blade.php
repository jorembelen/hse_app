@extends('layouts.master')

@section('title', 'Update Recommendation')
@section('content') 

<div class="row">
    <div class="col-3"></div>
<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
          <form class="mt-0" method="POST" action="{{ route('recommendations.update', $item->id) }}">
            @csrf
                <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Root Cause</label>
                            <div class="col-md-11 ml-3">
                                <textarea name="root_name" class="form-control" rows="3">{{$item->root_name}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-username" class="col-md-4 ml-3 col-form-label">Type</label>
                            <div class="col-md-11 ml-3">
                              <select name="type" class="form-control select2">
                                <option value="{{ $item->type }}">{{ $item->type }}</option>
                                <option value="People" @if (old('type') == 'People') selected="selected" @endif>People</option>
                                <option value="Process" @if (old('type') == 'Process') selected="selected" @endif>Process</option>
                                <option value="Equipment" @if (old('type') == 'Equipment') selected="selected" @endif>Equipment</option>
                                <option value="Workplace" @if (old('type') == 'Workplace') selected="selected" @endif>Workplace</option>
                        </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Recommendation</label>
                            <div class="col-md-11 ml-3">
                              <textarea name="rec_name" class="form-control" rows="3">{{$item->rec_name}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Type</label>
                            <div class="col-md-11 ml-3">
                              <select name="rec_type" class="form-control select2" required>
                                <option value="{{ $item->rec_type }}">{{ $item->rec_type }}</option>
                                <option value="Elimination" @if (old('rec_type') == 'Elimination') selected="selected" @endif>Elimination</option>
                                <option value="Substitution" @if (old('rec_type') == 'Substitution') selected="selected" @endif>Substitution</option>
                                <option value="Engineering Control" @if (old('rec_type') == 'Engineering Control') selected="selected" @endif>Engineering Control</option>
                                <option value="Administrative Control" @if (old('rec_type') == 'Administrative Control') selected="selected" @endif>Administrative Control</option>
                                <option value="PPE" @if (old('rec_type') == 'PPE') selected="selected" @endif>PPE</option>
                        </select>
                            </div>
                        </div>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin')
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Status</label>
                            <div class="col-md-11 ml-3">
                              <select name="status" class="form-control select2" required>
                                <option value="{{ $item->status }}">
                                    @if($item->status == 0)
                                    <span class="badge badge-danger">On Going</span>
                                    @else
                                    <span class="badge badge-info">Done</span>
                                    @endif
                                </option>
                                <option value="1" @if (old('status') == '1') selected="selected" @endif>Done</option>
                                <option value="0" @if (old('status') == '0') selected="selected" @endif>On-Going</option>
                        </select>
                            </div>
                        </div>
                        @endif
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

                          
                