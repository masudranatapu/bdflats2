<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HscodeRequest extends FormRequest
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

            'subcategory'       => 'required|min:1',
            'code'              => 'required',


        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'subcategory.required'  => 'Please select subcategory',
            'code.required'         => 'Please enter hscode!',

        ];
    }
}
