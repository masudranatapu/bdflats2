<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminUserRequest extends FormRequest
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'designation'   => 'required',
            'status'        => 'required',
//            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'username'      => "required | unique(SA_USER)->ignore->$this->('PK_NO')",
            'mobile_no'     => 'required',
            'email'         => "required | unique(SA_USER)->ignore->$this->('PK_NO')",
            'password'      => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'gender'        => 'required',
            'can_login'     => 'required'
        ];
    }
}
