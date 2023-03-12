<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyCategoryRequest extends FormRequest
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
            'category_name'                 => 'required',
            'meta_title'                    => 'required',
            'meta_description'              => 'required',
            'order'                         => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'category_name.required'    => 'Please enter category name!',
            'meta_title.required'       => 'Please enter meta title!',
            'order.required'            => 'Please enter category order!'
        ];
    }
}
