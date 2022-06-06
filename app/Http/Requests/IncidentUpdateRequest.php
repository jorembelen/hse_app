<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidentUpdateRequest extends FormRequest
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
            'wps' => 'required',
            'location' => 'required|exists:locations,id',
            'severity' => 'required',
            'description' => 'required',
            'action' => 'required',
            'date' => 'required',
            'docs' => 'mimes:zip,doc,docx,pdf|max:2048M',
            'images.*' => 'image|mimes:jpeg,bmp,png,gif,svg,jpg|max:5048',
        ];
    }
}
