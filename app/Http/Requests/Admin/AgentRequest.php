<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
        $id = (int)$this->segment(3);

        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => "required|unique:users,EMAIL,{$id},id",
            'images.*' => 'sometimes|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter Name!',
            'phone.required' => 'Please enter Phone No.!',
            'email.required' => 'Please enter Email!',
            'email.unique' => 'This email is already exists',
            'images.*.dimensions' => 'Image should be 300x300'
            // 'email.unique:auths'        => 'This email is already exists as Admin',
        ];
    }
}
