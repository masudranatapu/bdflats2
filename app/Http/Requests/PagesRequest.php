<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesRequest extends FormRequest
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
        $rules = [
            'page_category' => 'required',
            'page_title' => 'required|min:2|max:255',
            'page_url' => 'required',
//            'search_url' => 'required',
            'meta_keywords' => 'required|max:255',
            'status' => 'required',
            'order_id' => 'required|min:1',
//            'images' => 'required',
            'images.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
        ];

        if ($this->has('update')) {
            $rules['images'] = 'sometimes';
            $rules['images.*'] = 'sometimes|image|mimes:jpg,png,jpeg,gif';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'images.*.image' => 'Must be an image',
            'images.*.mimes' => 'Must be a file of type: jpg, png, jpeg, gif',
        ];
    }
}
