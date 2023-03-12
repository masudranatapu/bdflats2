<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductBrandRequest extends FormRequest
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
            'brand_name'   => 'required|min:3|max:100',
            'brand_code'   => 'required|min:3|max:10',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Please enter your Brand Name !',
            'brand_code.required' => 'Please enter your Brand Code !',
        ];
    }
}
