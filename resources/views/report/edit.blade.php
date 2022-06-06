@extends('layouts.master')

@section('title', 'Investigation Report Update')
@section('content') 
 

<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3>Update {{ $reports->id }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('reports.update', $reports->id) }}" enctype="multipart/form-data" id="rep-Update">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="incident_id" value="{{ $reports->incident_id }}">
                    <input type="hidden" name="employee_id" value="{{ $reports->employee_id }}">
                    <input type="hidden" name="location_id" value="{{ $reports->location_id }}">
                <div class="row">

                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="mgr_name">Line Managers Name<span class="text-danger"> *</span></label>
                            <select name="mgr_name" class="form-control select2" >
                                <option value="{{ $reports->mgr_name }}"> {{ $reports->manager->badge }} - {{ $reports->manager->name }} ({{ $reports->manager->designation }})</option>
                                @foreach( $officers as $officer)
                                <option value="{{$officer->id}}" @if (old('mgr_name') == $officer->id ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="sup_name">Supervisors Name<span class="text-danger"> *</span></label>
                            <select name="sup_name" class="form-control select2" >
                                <option value="{{ $reports->sup_name }}"> {{ $reports->supervisor->badge }} - {{ $reports->supervisor->name }} ({{ $reports->supervisor->designation }})</option>
                                @foreach( $officers as $officer)
                                <option value="{{$officer->id}}" @if (old('sup_name') == $officer->id ) selected="selected" @endif>{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group">
                            <label for="inc_loc">Place of the Incident/Injury<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="{{ $reports->inc_loc }}" name="inc_loc" placeholder="Place of the Incident/Injury" >
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group">
                            <label for="nature">Nature of the Incident/Injury<span class="text-danger"> *</span></label>
                            <select name="nature" class="form-control select2" >
                                <option value="{{ $reports->nature }}">{{ $reports->nature }}</option>
                                <option value="Occupational" @if (old('nature') == 'Occupational') selected="selected" @endif>Occupational</option>
                                <option value="Road Traffic" @if (old('nature') == 'Road Traffic') selected="selected" @endif>Road Traffic</option>
                                <option value="None" @if (old('nature') == 'None') selected="selected" @endif>None</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group">
                            <label for="other">Specify<span class="text-danger"> *</span></label>
                            <input value="{{ $reports->other }}" name="other" class="form-control" type="text" placeholder="Please specify . . ." >
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="description">Brief Description of the Incident/Injury<span class="text-danger"> *</span></label>
                            <textarea class="form-control" name="description" placeholder="Write your Brief Description of the Incident/Injury here ..." >{{ $reports->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="details">Details of the Injury (Specify affected body parts)<span class="text-danger"> *</span></label>
                            <textarea class="form-control" name="details" placeholder="Write your Details of the Injury here ..." >{{ $reports->details }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="aid">First Aid Given?<span class="text-danger"> *</span></label>
                            <select name="aid" class="form-control select2" id="frst_aid" >
                                    <option value="{{ $reports->aid }}">{{ $reports->aid }}</option>
                                    <option value="Yes" @if (old('aid') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('aid') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group frm-aider-div" id="vidYes" style="display:none">
                            <label for="aider">Name of First Aider<span class="text-danger"> </span></label>
                            <select name="aider" class="form-control select2">
                                <option value="{{ $reports->aider }}"> {{ $reports->nurse->badge }} - {{ $reports->nurse->name }} ({{ $reports->nurse->designation }})</option>
                                @foreach( $officers as $officer)
                                <option value="{{$officer->id}}">{{$officer->badge}} - {{$officer->name}} ({{$officer->designation}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 col-xl-2">
                        <div class="form-group">
                            <label for="hosp">Hospitalized?<span class="text-danger"> *</span></label>
                            <select name="hosp" class="form-control select2" id="frm_hosp" >
                                    <option value="{{ $reports->hosp }}">{{ $reports->hosp }}</option>
                                    <option value="Yes" @if (old('hosp') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('hosp') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group frm-hosp-div" id="hospYes" style="display:none">
                            <label for="hospital">Name of Hospital where patient was treated/transferred<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" value="{{ $reports->hospital }}" name="hospital" placeholder="Name of hospital">
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group frm-hosp-div" id="hosp1Yes" style="display:none">
                            <label for="hos_addr">Address/Location of the hospital<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" value="{{ $reports->hos_addr }}" name="hos_addr" placeholder="Address of hospital">
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="med_leave">Medical leave given by administering Hospital/Clinic or Doctor?<span class="text-danger"> *</span></label>
                            <select name="med_leave" class="form-control select2" id="med_leave" >
                                    <option value="{{ $reports->med_leave }}">{{ $reports->med_leave }}</option>
                                    <option value="Yes" @if (old('med_leave') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('med_leave') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group frm-leave-div" id="divYes" style="display:none">
                            <label for="leave_days">Number of Days<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" value="{{ $reports->leave_days }}" name="leave_days" placeholder="Number of Days">
                        </div>
                    </div>
                    <div class="col-2 col-xl-2">
                        <div class="form-group">
                            <label for="prop_dam">Property damage?<span class="text-danger"> *</span></label>
                            <select name="prop_dam" class="form-control select2" id="frm_duration" >
                                    <option value="{{ $reports->prop_dam }}">{{ $reports->prop_dam }}</option>
                                    <option value="Yes" @if (old('prop_dam') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('prop_dam') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 col-xl-2">
                        <div class="form-group form-duration-div" id="divFrmYes" style="display:none">
                            <label for="est_dam">Est. percentage of damage<span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->est_dam }}" name="est_dam" placeholder="Estimated percentage of damage">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm1Yes" style="display:none">
                            <label for="est_amt">Est. Cost of damaged (SAR)<span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->est_amt }}" name="est_amt" placeholder="Estimated Cost of damaged (SAR)">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm2Yes" style="display:none">
                            <label for="property">Type / Function of the property<span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->property }}" name="property" placeholder="Type / Function of the property">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm3Yes" style="display:none">
                            <label for="prop_loc">Location of affected property <span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->prop_loc }}" name="prop_loc" placeholder="Location of affected property">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm4Yes" style="display:none">
                            <label for="prop_manuf">Name of Manufacturer<span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->prop_manuf }}" name="prop_manuf" placeholder="Type / Function of the property">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm5Yes" style="display:none">
                            <label for="prop_model">Model of the Property <span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->prop_model }}" name="prop_model" placeholder="Model of the Property">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm6Yes" style="display:none">
                            <label for="prop_plate">Plate Number<span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->prop_plate }}" name="prop_plate" placeholder="Plate Number">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm7Yes" style="display:none">
                            <label for="prop_reg">Vehicle Registration Number <span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->prop_reg }}" name="prop_reg" placeholder="Vehicle Registration Number">
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group form-duration-div" id="divFrm8Yes" style="display:none">
                            <label for="prop_rte">Company Fleet Number<span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->prop_rte }}" name="prop_rte" placeholder="Company Fleet Number">
                        </div>
                    </div>
                    <div class="col-3 col-xl-3">
                        <div class="form-group">
                            <label for="toolbox">Was Pre- Task / Toolbox meeting conducted <span class="text-danger"> *</span></label>
                            <select name="toolbox" class="form-control select2" >
                                    <option value="{{ $reports->toolbox }}">{{ $reports->toolbox }}</option>
                                    <option value="Yes" @if (old('toolbox') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('toolbox') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group">
                            <label for="ppe">Was the person using   Personal Protective Equipment (PPE) <span class="text-danger"> *</span></label>
                            <select name="ppe" class="form-control select2" id="frm_ppe" >
                                    <option value="{{ $reports->ppe }}">{{ $reports->ppe }}</option>
                                    <option value="Yes" @if (old('ppe') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('ppe') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5 col-xl-5">
                        <div class="form-group frm-ppe-div" id="divPpeYes" style="display:none">
                            <label for="ppe_equip">Specify the Personal Protective Equipment (PPE)  <span class="text-danger"> </span></label>
                                <input type="text" class="form-control" value="{{ $reports->ppe_equip }}" name="ppe_equip" placeholder="Enter data here . . .">
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="emp_doing">What was the injured person/employee doing at the time of the incident?  <span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" value="{{ $reports->emp_doing }}" name="emp_doing" placeholder="Enter data here . . ." >
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="emp_machine">What was the machine/equipment doing at the time of the incident?  <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="{{ $reports->emp_machine }}" name="emp_machine" placeholder="Enter data here . . ." >
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group">
                            <label for="emp_material">What was the material(s) / substance(s) doing at the time of the incident  <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="{{ $reports->emp_material }}" name="emp_material" placeholder="Enter data here . . ." >
                        </div>
                    </div>
                    <div class="col-8 col-xl-8">
                        <div class="form-group">
                            <label for="imm_cause">Immediate Cause(s) of the Incident/injury:<span class="text-danger"> *</span></label>
                            <textarea class="form-control" name="imm_cause" placeholder="Write your data here ..." >{{ $reports->imm_cause }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-2 col-xl-2">
                        <div class="form-group">
                            <label for="witness">Were there any witnesses?<span class="text-danger"> *</span></label>
                            <select name="witness" class="form-control select2" id="witness_frm" >
                                    <option value="{{ $reports->witness }}">{{ $reports->witness }}</option>
                                    <option value="Yes" @if (old('witness') == 'Yes') selected="selected" @endif>Yes</option>
                                    <option value="No" @if (old('witness') == 'No') selected="selected" @endif>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 col-xl-2">
                        <div class="form-group frm-div" id="selectYes" style="display:none">
                            <label for="wit_type">Type of witness(es)<span class="text-danger"> </span></label>
                            <select name="wit_type" class="form-control select2">
                                    <option value="{{ $reports->wit_type }}">{{ $reports->wit_type }}</option>
                                    <option value="Employee" @if (old('wit_type') == 'Employee') selected="selected" @endif>Employee</option>
                                    <option value="Public" @if (old('wit_type') == 'Public') selected="selected" @endif>Public</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-8 col-xl-8">
                        <div class="form-group frm-div" id="select1Yes" style="display:none">
                            <label for="wit_details">Witness Details:<span class="text-danger"> *</span></label>
                            <textarea class="form-control" name="wit_details" placeholder="Write your data here ...">{{ $reports->wit_details }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-xl-12">
                        <div class="form-group frm-div" id="select2Yes" style="display:none">
                            <label for="wit_statement">Witness Statement:<span class="text-danger"> *</span></label>
                            <textarea class="form-control" name="wit_statement" placeholder="Write your data here ...">{{ $reports->wit_statement }}</textarea>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="form-group">
                            <label for="safety">Safety Awareness Training Date<span class="text-danger"> </span></label>
                            <input type="text" id="dateTimeFlatpickr2" class="form-control" value="{{ $reports->safety }}" name="safety" placeholder="Safety Awareness Training Date">
                            </div>
                    </div>
                    <div class="col-8 col-xl-8">
                        <div class="form-group">
                            <label for="proof_training">Training Topic<span class="text-danger"> </span></label>
                            <input type="text" class="form-control" value="{{ $reports->proof_training }}" name="proof_training" placeholder="Proof of Training">
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group custom-file-container" data-upload-id="myFirstImage">
                            <label>Proof of Training (Attach image) <a href="#" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class=" form-controlcustom-file-container__custom-file__custom-file-input" name="proof[]"  multiple>
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group custom-file-container" data-upload-id="mySecondImage">
                            <label>Incident Images (Attach image) <a href="#" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class=" form-controlcustom-file-container__custom-file__custom-file-input" name="inc_img[]"  multiple>
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-6">
                        <div class="form-group">
                            <label for="docs">Attached Documents (word/pdf)<span class="text-danger"> </span></label>
                                    <input type="file" class="form-control-file"  name="docs">
                                   
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                        <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                        <a href="{{ \URL::previous() }}" type="button" class="btn btn-danger waves-effect disabled-button-prevent">Cancel</a>
                    </div>
                </form>

{{-- End --}}
                </div>
            </div>
        </div>
    
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!-- For add and remove inputs -->
    <script>
        $(document).ready(function(){
    
        var count = 1;
    
        dynamic_field(count);
    
        function dynamic_field(number)
        {
        html = '<tr>';
                html += '<td><input type="text" name="root_name[]" class="form-control" ></td>';
                html += '<td><select type="text" name="root_description[]" class="form-control" ><option value="">Select</option><option value="People" @if (old('root_description') == 'People') selected="selected" @endif>People</option><option value="Process" @if (old('root_description') == 'Process & Procedure') selected="selected" @endif>Process & Procedure</option><option value="Equipment" @if (old('root_description') == 'Equipment') selected="selected" @endif>Equipment</option><option value="Workplace" @if (old('root_description') == 'Workplace') selected="selected" @endif>Workplace</option></select></td>';
                html += '<td><input type="text" name="rec_name[]" class="form-control" ></td>';
                html += '<td><select type="text" name="rec_type[]" class="form-control" ><option value="">Select</option><option value="Elimination" @if (old('rec_type') == 'Elimination') selected="selected" @endif>Elimination</option><option value="Substitution" @if (old('rec_type') == 'Substitution') selected="selected" @endif>Substitution</option><option value="Engineering Control" @if (old('rec_type') == 'Engineering Control') selected="selected" @endif>Engineering Control</option><option value="Administrative Control" @if (old('rec_type') == 'Administrative Control') selected="selected" @endif>Administrative Control</option><option value="PPE Control" @if (old('rec_type') == 'PPE Control') selected="selected" @endif>PPE Control</option></select></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">X</button></td></tr>';
                    $('tbody').append(html);
                }
                else
                {   
                    html += '<td><button type="button" name="add" id="add" class="btn btn-primary">+</button></td></tr>';
                    $('tbody').html(html);
                }
        }
    
        $(document).on('click', '#add', function(){
        count++;
        dynamic_field(count);
        });
    
        $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
        });
    
        });
        </script>
	@include('scripts.investigation')
@endsection


