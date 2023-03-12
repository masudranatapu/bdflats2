<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'permission_slug'   => 'required|min:3|max:100',
            'display_name'      => 'required|min:3|max:100',
            'permission_group'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'permission_group.required' => 'Please select permission group !',
        ];
    }
}
