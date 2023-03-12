<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
        $userID = $this->route()->parameter('id');

        if ($this->get('user_type') == 2) {
            $rules = [
                'user_type' => 'required',
                'name' => 'required|max:50',
                'email' => 'required|email|unique:users,email,' . $userID . ',id',
                'images' => 'sometimes|array|min:1',
                'images.*' => 'sometimes|image|mimes:jpg,png,jpeg,gif|dimensions:width=300,height=300',
                'mobile_no' => 'required|max:20',
                'listing_limit' => 'required',
                'auto_payment_renew' => 'required|min:0|max:1'
            ];
        } else {
            $rules = [
                'user_type' => 'required',
                'company_name' => 'required|max:50',
                'contact_person_name' => 'required|max:50',
                'designation' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $userID . ',id',
                'images' => 'sometimes|array|min:1',
                'images.0' => 'sometimes|image|mimes:jpg,png,jpeg,gif|dimensions:width=300,height=300',
                'images.1' => 'sometimes|image|mimes:jpg,png,jpeg,gif|dimensions:width=1100,height=350',
                'office_address' => 'required|max:200',
                'mobile_no' => 'required|max:20',
                'about_company' => 'required',
                'listing_limit' => 'required',
                'auto_payment_renew' => 'required|min:0|max:1'
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'images.0.dimensions' => 'The image must be 300x300',
            'images.1.dimensions' => 'The image must be 1100x350',
        ];
    }
}
