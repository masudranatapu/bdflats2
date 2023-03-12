<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category_name' => 'required|max:50',
            'status' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'order_id' => 'required',
            'property_for' => 'required',
        ];
    }
}
