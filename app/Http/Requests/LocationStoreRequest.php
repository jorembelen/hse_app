<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
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
            'division' => 'required',
            'name' => 'required',
            'loc_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The project name field is required.',
            'loc_name.required' => 'The location name field is required.',
        ];
    }


}
