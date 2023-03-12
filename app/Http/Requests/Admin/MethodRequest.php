<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MethodRequest extends FormRequest
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
        $rules = [

            'method'         => 'required|min:1',
            'name'              => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'bank_name.required'    => 'Please select source',
            'name.required'         => 'Please enter name!',

        ];
    }
}
