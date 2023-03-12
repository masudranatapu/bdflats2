<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        $id = (int) $this->segment(2);
        $rules = [
          'agent'                => 'required',
          'customername'         => 'required',
          'customeraddress'      => 'required',
          'email'                => "nullable|unique:SLS_CUSTOMERS,EMAIL,{$id},PK_NO",
          'ukid'                 => "nullable|unique:SLS_CUSTOMERS,UKSHOP_ID,{$id},PK_NO",

      ];

      return $rules;
    }

    public function messages()
    {
        return [
            'agent.required'            => 'Please enter customer name !',
            'customername.required'     => 'Please enter customer name !',
            'customeraddress.required'  => 'Please enter customer name !',
            'ukid.email'                => 'This email already used',
            'ukid.unique'               => 'This ID already used',
        ];
    }
}
