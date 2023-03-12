<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'inventory_name'         => 'required|min:3|max:100',
            'inventory_code'         => 'required|min:3|max:10',
            'inventory_location'     => 'required|min:3|max:100',
        ];
    }

    public function messages()
    {
        return [
            'inventory_name.required' => 'Please Enter Your Inventory Name !',
            'inventory_code.required' => 'Please enter your Inventory Code !',
            'inventory_location.required' => 'Please enter your Location !',
        ];
    }
}
