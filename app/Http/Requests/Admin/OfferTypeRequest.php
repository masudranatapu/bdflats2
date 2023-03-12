<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfferTypeRequest extends FormRequest
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
            'name'              => 'required',
            'public_name'       => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'             => 'Please enter name!',
            'public_name.required'      => 'Please enter name!',
        ];
    }
}
