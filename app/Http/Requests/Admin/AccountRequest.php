<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'bank_name'         => 'required',
            'bank_acc_name'     => 'required',
            'bank_acc_no'       => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'bank_name.required'        => 'Please enter bank name!',
            'bank_acc_name.required'    => 'Please enter bank account name!',
            'bank_acc_no.required'      => 'Please enter bank account number!',
        ];
    }
}
