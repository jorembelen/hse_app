<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'incident_id' => 'required|unique:reports|max:255',
            'employee_id' => 'required|max:255',
            'mgr_name' => 'required|max:255',
            'sup_name' => 'required|max:255',
            'nature' => 'required|max:255',
            'other' => 'required|max:255',
            'proof.*' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg|max:5048',
            'inc_img.*' => 'required|image|mimes:jpeg,bmp,png,gif,svg,jpg|max:5048',
            'inc_loc' => 'required|max:255',
            'description' => 'required|max:255',
            'details' => 'required',
            'aid' => 'required|max:255',
            'aider' => 'required_if:aid,Yes|max:255',
            'hosp' => 'required|max:255',
            'hospital' => 'required_if:hosp,Yes|max:255',
            'hos_addr' => 'required_if:hosp,Yes|max:255',
            'med_leave' => 'required|max:255',
            'leave_days' => 'required_if:med_leave,Yes|max:255',
            'prop_dam' => 'required|max:255',
            'toolbox' => 'required|max:255',
            'ppe' => 'required|max:255',
            'emp_doing' => 'required|max:255',
            'emp_machine' => 'required|max:255',
            'emp_material' => 'required|max:255',
            'imm_cause' => 'required',
            'root_name' => 'required|max:255',
            'root_description' => 'required|max:255',
            'rec_name' => 'required|max:255',
            'rec_type' => 'required|max:255',
            'witness' => 'required|max:255',
            'wit_type' => 'required_if:witness,Yes|max:255',
            'wit_details' => 'required_if:witness,Yes|max:255',
            'wit_statement' => 'required_if:witness,Yes|max:255',
            'docs' => 'mimes:zip,doc,docx,pdf',
        ];
    }

    public function messages()
    {
        return [
            'mgr_name.required' => 'The line manager\'s name field is required.',
            'sup_name.required' => 'The supervisor\'s name field is required.',
            'inc_loc.required' => 'The incident location field is required.',
            'nature.required' => 'The nature of incident field is required.',
            'other.required' => 'The specify field is required.',
            'aid.required' => 'The first aid field is required.',
            'med_leave.required' => 'The medical field is required.',
            'prop_dam.required' => 'The property damage field is required.',
            'hosp.required' => 'The hospitalized field is required.',
            'toolbox.required' => 'The toolbox meeting field is required.',
            'emp_doing.required' => 'The employee doing field is required.',
            'emp_machine.required' => 'The machine doing field is required.',
            'emp_material.required' => 'The material doing field is required.',
            'imm_cause.required' => 'The immediate cause field is required.',
            'inc_img.required' => 'The incident image field is required.',
            'root_name.required' => 'The root cause description is required.',
            'root_description.required' => 'The root cause type is required.',
            'rec_name.required' => 'The recommendation is required.',
            'rec_type.required' => 'The recommendation type is required.',
            'aider.required_if' => 'Please select first aider.',
            'wit_type.required_if' => 'Choose witness type.',
            'wit_details.required_if' => 'Witness details are required.',
            'wit_statement.required_if' => 'Witness statement is required.',
            'hospital.required_if' => 'Hospital name is required.',
            'hos_addr.required_if' => 'Hospital address is required.',
            'leave_days.required_if' => 'Please enter number of days.',
            'proof.*.image' => 'Please attach only image.',
            'inc_img.*.image' => 'Please attach only image.',
            'inc_img.*.required' => 'Please attach atleast 1 image.',
        ];
    }

}
