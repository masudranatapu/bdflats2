<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'property_for'      => 'required',
            'propertyType'     => 'required|integer',
            'city'              => 'required|integer',
            'area'              => 'required|integer',
            'address'           => 'required|max:190',
            'condition'         => 'required|integer',
            'property_priceChek'    => 'required|integer',
            'contact_person'    => 'required|max:45',
            'mobile'            => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15',
            'floor'             => 'nullable|integer',
            'facing'            => 'required|integer',
            'description'       => 'max:4000',
            'image'             => 'mimes:jpeg,jpg,png,gif',
            'status'            => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'property_for.required'     => 'Advertisement type is required!',
            'propertyType.required'    => 'Property type is required!',
            'city.required'             => 'City is required!',
            'area.required'             => 'Area is required!',
            'address.required'          => 'Address is required!',
            'condition.required'        => 'Property Condition is required!',
            'property_priceChek.required'=> 'Property Price is required!',
            'contact_person.required'   => 'Contact Person is required!',
            'mobile.required'           => 'Mobile Number is required!',
            'mobile.regex'              => 'Mobile Number Should Less Than 15 Character & Follow Mobile Number Format',
            'contact_person_2.required' => 'Contact Person is required!',
            'mobile_2.required'         => 'Mobile Number is required!',
            'mobile_2.regex'            => 'Mobile Number Should Less Than 15 Character & Follow Mobile Number Format',
            'listing_type.required'     => 'Listing Type is required!',
        ];
    }


}
