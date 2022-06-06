<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportUpdateRequest extends FormRequest
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
            'incident_id' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'mgr_name' => 'required|max:255',
            'sup_name' => 'required|max:255',
            'nature' => 'required|max:255',
            'other' => 'required|max:255',
            'proof.*' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg|max:5048',
            'inc_img.*' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg|max:5048',
            'inc_loc' => 'required|max:255',
            'description' => 'required',
            'details' => 'required',
            'aid' => 'required|max:255',
            'hosp' => 'required|max:255',
            'med_leave' => 'required|max:255',
            'prop_dam' => 'required|max:255',
            'toolbox' => 'required|max:255',
            'ppe' => 'required|max:255',
            'emp_doing' => 'required|max:255',
            'emp_machine' => 'required|max:255',
            'emp_material' => 'required|max:255',
            'imm_cause' => 'required',
            'witness' => 'required|max:255',
            'docs' => 'mimes:zip,doc,docx,pdf|max:2048',
        ];
    }
}
