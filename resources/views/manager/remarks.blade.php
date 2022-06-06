
                         <!-- Modal -->
                         <div class="modal fade register-modal" id="remarks{{ $reports->id }}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                          <div class="modal-header" id="registerModalLabel">
                                            <h4 class="modal-title">Remarks</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="mt-0" method="POST" action="{{ route('remarks.store') }}">
                                             @csrf
                                             <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                             <input type="hidden" name="incident_id" value="{{ $reports->incident_id }}">
                                             <input type="hidden" name="report_id" value="{{ $reports->id }}">
                                         
                                                       <div class="form-group">
                                                        <select name="status" class="form-control select2">
                                                          @if (auth()->user()->role == 'gm')
                                                          <input type="hidden" name="status" value="None">
                                                          @else
                                                          <option value="">Select</option>
                                                          <option value="Best Practice" @if (old('status') == 'Best Practice') selected="selected" @endif>Best Practice</option>
                                                          <option value="Satisfactory" @if (old('status') == 'Satisfactory') selected="selected" @endif>Satisfactory</option>
                                                          <option value="Required Improvement" @if (old('status') == 'Required Improvement') selected="selected" @endif>Required Improvement</option>
                                                          @endif
                                                        </select> 
                                                        @if($errors->has('status'))
                                                                <span class="help-block text-danger">{{ $errors->first('status') }}</span>
                                                            @endif
                                                        </div>
                                                       
                                                       <div class="form-group">
                                                        <textarea rows="3" name="note" class="form-control" placeholder="Write your comments here ..." required>{{ old('note') }}</textarea>
                                                            @if($errors->has('note'))
                                                                <span class="help-block text-danger">{{ $errors->first('note') }}</span>
                                                            @endif
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


                     