<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'category_code'   => 'required|min:3|max:10',
            'category_name'   => 'required|min:3|max:100',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Please enter your Brand Name !',
            'category_code.required' => 'Please enter your Brand Code !',
        ];
    }
}
