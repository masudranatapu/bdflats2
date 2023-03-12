<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductVariantRequest extends FormRequest
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
            'pk_no'                  => 'required|integer|min:1',
            'color'                  => 'required|integer|min:1',
            'size'                   => 'required|integer|min:1',
            'name'                   => 'required',
            'vat_class'              => 'required|integer|min:1',
            'hs_code'                => 'required',
            'air_freight'            => 'required',
            'sea_freight'            => 'required',
            'price'                  => 'required',
            'price_ins'              => 'required',
            'local_postage'          => 'required',
            'int_postage'            => 'required|min:1',
            'def_shipping_method'    => 'required',


        ];

    // if(request()->variant_pk_no)
    // {
    //     $id = request()->variant_pk_no;
    //     $rules['code']         = 'required|unique:PRD_VARIANT_SETUP,CODE,'. $id.',PK_NO'; 
    
    // }else{
    //     $rules['code']         = 'required|unique:PRD_VARIANT_SETUP,CODE,NULL,PK_NO';
    // }


        return $rules;
    }

    public function messages()
    {
        return [
          
           'name.required'          => 'This field is required',

        ];
    }


}
