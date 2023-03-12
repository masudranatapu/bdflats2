<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class ResellerRequest extends FormRequest
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
        $id = (int) $this->segment(3);
        $rules = [
            'agent'   => 'required',
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => "nullable|unique:SLS_RESELLERS,EMAIL,{$id},PK_NO",
            'uk_id'   => "nullable|unique:SLS_RESELLERS,UKSHOP_ID,{$id},PK_NO",
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'agent.required'  => 'Please enter Name!',
            'name.required'  => 'Please enter Name!',
            'phone.required' => 'Please enter Phone No.!',
            'email.required' => 'Please enter Email!',
        ];

    }


}
