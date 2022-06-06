<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;

class IncidentStoreRequest extends FormRequest
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
            'user_id' => 'required',
            'employee_id' => 'required',
            'type' => 'required',
            'inc_category' => 'required',
            'insurance' => 'required',
            'injury_location' => 'required',
            'injury_sustain' => 'required',
            'cause' => 'required',
            'equipment' => 'required',
            'wps' => 'required',
            'sel_involved' => 'required',
            'employee' => 'required_if:sel_involved,Employee',
            'contractor' => 'required_if:sel_involved,NonEmployee',
            'location' => 'required|exists:locations,id',
            'severity' => 'required',
            'description' => 'required',
            'action' => 'required',
            'date' => 'required',
            'docs' => 'mimes:zip,doc,docx,pdf|max:2048',
            'images.*' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'The safety officer\'s name field is required.',
            'type.required' => 'The incident type field is required.',
            'sel_involved.required' => 'Please select type of persons involved.',
            'images.*.image' => 'The incident images should be an image type.',
            'inc_category.required' => 'The incident category field is required.',
            'cause.required' => 'The immediate cause field is required.',
            'equipment.required' => 'The equipment involved field is required.',
            'employee.required_if' => 'Please select employees involved.',
            'contractor.required_if' => 'Please specify non employees detail involved.',
        ];
    }

}
