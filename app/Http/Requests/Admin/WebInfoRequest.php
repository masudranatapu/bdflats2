<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WebInfoRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required',
            'header_logo' => 'sometimes|array|min:1',
            'header_logo.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
            'footer_logo' => 'sometimes|array|min:1',
            'footer_logo.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
            'app_logo' => 'sometimes|array|min:1',
            'app_logo.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
            'meta_image' => 'sometimes|array|min:1',
            'meta_image.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif',
            'favicon' => 'sometimes|array|min:1',
            'favicon.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif,ico',
            'phone_one' => 'required|max:15',
            'email_one' => 'required|email|max:100',
            'hq_address' => 'required',
            'url' => 'required|max:255',
            'copyright_text' => 'required|max:255',
            'feature_property_limit' => 'required|min:0'
        ];
    }
}
