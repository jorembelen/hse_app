
                                     <!-- Modal -->
                                     <div class="modal fade register-modal" id="create" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Add User</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0 form-disabled-button" method="POST" action="{{ route('users.store') }}" id="user-create">
                                             @csrf
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="name"  value="{{ old('name') }}" placeholder="Name" > 
                                                        @if($errors->has('name'))
                                                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control mb-2" name="username" value="{{ old('username') }}" placeholder="Username" >
                                                        @if($errors->has('username'))
                                                          <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="email" class="form-control mb-2" name="email" value="{{ old('email') }}" placeholder="Email">
                                                        @if($errors->has('email'))
                                                          <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                      <select name="role" class="form-control selectpicker" id="role-sel" >
                                                        <option value="">Select Role</option>
                                                           <option value="admin">Admin</option>
                                                           <option value="user">User</option>
                                                           <option value="site_member">Site Member</option>
                                                           <option value="gm">GM</option>
                                                           <option value="hsem">HSEM</option>
                                                                <option value="hse-member">HSE Member</option>
                                                           <option value="member">Member</option>
                                                      </select>
                                                      @if($errors->has('role'))
                                                      <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                                                    @endif
                                                  </div>
                                                  <div class="form-group frm-role" id="roleuser" style="display:none">
                                                    <select name="location_id" class="form-control selectpicker" data-live-search="true">
                                                        <option value="">Select Project Location</option>
                                                        @foreach( $locations as $location)
                                                          <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}}</option>
                                                        @endforeach
                                                    </select>
                                                      @if($errors->has('location_id'))
                                                        <div class="invalid-feedback">{{ $errors->first('location_id') }}</div>
                                                      @endif
                                                </div>
                                                  <div class="form-group frm-role" id="rolesite_member" style="display:none">
                                                    <select name="location_id_2" class="form-control selectpicker" data-live-search="true">
                                                        <option value="">Select Project Location</option>
                                                        @foreach( $locations as $location)
                                                        <option value="{{$location->id}}" @if (old('location') == $location->id ) selected="selected" @endif>{{$location->name}}</option>
                                                        @endforeach
                                                    </select>
                                                      @if($errors->has('location_id'))
                                                        <div class="invalid-feedback">{{ $errors->first('location_id') }}</div>
                                                      @endif
                                                </div>
                                                    <div class="form-group">
                                                    <input type="password" class="form-control mb-2" name="password" placeholder="Password" >
                                                      @if($errors->has('password'))
                                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                                      @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="password" class="form-control mb-2" name="password_confirmation" placeholder="Confirm Password" >
                                                    </div>
                                                        <div class="modal-footer justify-content-between">
                                                          <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                                                          <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                                                          <button type="button" class="btn btn-danger waves-effect disabled-button-prevent" data-dismiss="modal">Close</button>
                                                        </div>
                                            </form>


                                          </div>
                                          <div class="modal-footer justify-content-center">
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>

