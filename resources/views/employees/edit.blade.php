@extends('layouts.master')

@section('title', 'Update Employee')
@section('content') 

<div class="row">
    <div class="col-3"></div>
<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <form class="mt-0 form-disabled-button" method="POST" action="{{ route('employees.update', $employee->id) }}" id="emp-create">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Badge</label>
                            <div class="col-md-11 ml-3">
                            <input type="text" class="form-control mb-2" name="badge" value="{{ $employee->badge }}"  placeholder="Badge">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-username" class="col-md-4 ml-3 col-form-label">Name</label>
                            <div class="col-md-11 ml-3">
                            <input type="text" class="form-control mb-2" name="name" value="{{ $employee->name }}" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Designation</label>
                            <div class="col-md-11 ml-3">
                            <input type="text" class="form-control mb-2" name="designation" value="{{ $employee->designation }}" placeholder="Designation">
                            </div>
                        </div>
              
                </div>
                <div class="modal-footer">
                    <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                    <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                    <a href="/admin/employees" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                </form>
        </div>
    </div>
</div>
<div class="col-3"></div>
</div>
@endsection