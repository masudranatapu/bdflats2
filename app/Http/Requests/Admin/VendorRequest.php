<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
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
        $id = (int) $this->segment(2);

        if (is_int($id) && $id > 0) {

            $rules = [
                //'code'          => 'unique:PRC_VENDORS, CODE,'.$id.',PK_NO',
                //unique:table,column,except,idColumn
                'name'          => 'required',
                'address'       => 'required',
                'country'       => 'required',
                'phone'         => 'required',
                'has_loyality'  => 'required'
            ];

        } else {
            
            $rules = [
                'code'          => 'unique:PRC_VENDORS',
                'name'          => 'required',
                'address'       => 'required',
                'country'       => 'required',
                'phone'         => 'required',
                'has_loyality'  => 'required'
            ];
        }

        return $rules;
    }
}
