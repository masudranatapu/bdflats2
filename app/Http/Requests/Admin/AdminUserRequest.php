<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
        $update = $this->segment(4);

        if (! is_int($id)) {
            $id = (int) $this->segment(3);
        }

        if($update == 'single'){
            $rules = [
                'first_name'    => 'required|min:1|max:100',
                'last_name'     => 'max:100',
                'designation'   => 'max:100',
                'profile_pic'   => 'image|mimes:jpeg,png,jpg,gif',
                'mobile_no'     => "required|unique:SA_USER,MOBILE_NO,{$id},PK_NO,USER_TYPE,0",
                'password'      => 'nullable|min:3|same:password_confirmation',
                'password_confirmation' => 'nullable|min:3',
                'gender'        => 'nullable'
            ];
        }else if (is_int($id) && $id > 0) {

            $rules = [
                'first_name'    => 'required|min:1|max:100',
                'last_name'     => 'max:100',
                'designation'   => 'max:100',
                'status'        => 'required',
                'profile_pic'   => 'image|mimes:jpeg,png,jpg,gif',
                'username'      => "unique:SA_USER,USERNAME,{$id},PK_NO,USER_TYPE,0",
                // 'mobile_no'     => "required|unique:SA_USER,MOBILE_NO,{$id},id,user_type,0|regex:/^01[0-9]/",
                'mobile_no'     => "required|unique:SA_USER,MOBILE_NO,{$id},PK_NO,USER_TYPE,0",
                'email'         => "EMAIL|unique:SA_USER,EMAIL,{$id},PK_NO,USER_TYPE,0",
                'gender'        => 'nullable',
                'can_login'     => 'required',
                'user_group'    => 'required',
                //'role'        => 'required'
            ];
        }else {

            $rules = [
                'first_name'    => 'required|min:1|max:100',
                'last_name'     => 'max:100',
                'designation'   => 'max:100',
                'status'        => 'required',
                'profile_pic'   => 'image|mimes:jpeg,png,jpg,gif',
                'username'      => 'unique:SA_USER,USERNAME,NULL,PK_NO,USER_TYPE,0|min:1',
                'mobile_no'     => 'required|unique:SA_USER,MOBILE_NO,NULL,PK_NO,USER_TYPE,0',
                'email'         => 'required|unique:SA_USER,EMAIL,NULL,PK_NO,USER_TYPE,0|min:4',
                // 'password'      => 'required|confirmed|min:6',
                'password'      => 'min:3|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required|min:3',
                'gender'        => 'nullable',
                'can_login'     => 'required',
                'user_group'    => 'required',
                //'role'        => 'required'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
           // 'user_type.required' => 'Please select user type',
        ];
    }
}
