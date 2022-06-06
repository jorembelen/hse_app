@extends('layouts.master')

@section('title', 'Update User')
@section('content') 

<div class="row">
    <div class="col-3"></div>
<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <form class="mt-0 form-disabled-button" method="POST" action="{{ route('users.update', $user->id) }}" id="user-update">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Name</label>
                            <div class="col-md-11 ml-3">
                            <input type="text" class="form-control mb-2" name="name"  value="{{ $user->name }}" placeholder="Name" > 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-username" class="col-md-4 ml-3 col-form-label">Username</label>
                            <div class="col-md-11 ml-3">
                            <input type="text" class="form-control mb-2" name="username" value="{{ $user->username }}" placeholder="Username" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Email</label>
                            <div class="col-md-11 ml-3">
                            <input type="email" class="form-control mb-2" name="email" value="{{ $user->email }}" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">User Role</label>
                            <div class="col-md-11 ml-3">
                                <select name="role" class="form-control select2">
                                    <option value="{{  $user->role }}" selected>{{  Str::upper($user->role)  }}</option>
                                     <option value="admin">Admin</option>
                                     <option value="user">User</option>
                                     <option value="site_member">Site Member</option>
                                     <option value="gm">GM</option>
                                     <option value="hsem">HSEM</option>
                                         <option value="hse-member">HSE Member</option>
                                     <option value="member">Member</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Location</label>
                            <div class="col-md-11 ml-3">
                                <select name="location_id" class="form-control select2">
                                    <option value="{{ $user->location_id }}">{{ $user->locations->name }} - {{ $user->locations->loc_name }}</option>
                                    <option value="">None</option>
                                    @foreach( $locations as $location)
                                    <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Password</label>
                            <div class="col-md-11 ml-3">
                            <input type="password" class="form-control mb-2" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Confirm Password</label>
                            <div class="col-md-11 ml-3">
                            <input type="password" class="form-control mb-2" name="password_confirmation" placeholder="Confirm Password">
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