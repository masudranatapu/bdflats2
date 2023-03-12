<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceProcessingRequest extends FormRequest
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
            'invoice_pk_no'    => 'required|min:1',
            'warehouse'        => 'required|min:1',
            
        ];

        return $rules;
    }


    public function messages()
    {
        return [
            'invoice_pk_no.required'    => 'Invoice no is required field!',
            'warehouse.required'        => 'Warehouse is required field!',
            

        ];
    }


}
