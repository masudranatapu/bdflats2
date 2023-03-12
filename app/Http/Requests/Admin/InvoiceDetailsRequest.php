<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceDetailsRequest extends FormRequest
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
                'code'          => 'unique:PRC_STOCK_IN, CODE,'.$id.',PK_NO',
                //unique:table,column,except,idColumn
                'invoice_no'    => 'required|min:1',
                'invoice_date'  => 'required',
                'vendor'        => 'required|integer|min:1',
                'purchaser'         => 'required|integer|min:1',
                'currency'  => 'required|integer|min:1',
                'gbp_to_mr'  => 'required|integer|min:1',
                //'ac_to_gbp'  => 'required|integer|min:1',
                'total_qty'  => 'required|integer|min:1',
                'recieved_qty'  => 'required|integer|min:1',
                'total_amount'  => 'required|integer|min:1',
                'has_vat_refund'  => 'required|integer',
                'has_loyality'  => 'required|integer',
                //'images'        => 'file|mimes:jpeg,png,jpg,gif',
            ];

        } else {
            
            $rules = [
                'code'          => 'unique:PRC_STOCK_IN,CODE',
                //unique:table,column,except,idColumn
                'invoice_no'    => 'required|min:1',
                'invoice_date'  => 'required',
                'vendor'        => 'required|integer|min:1',
                'purchaser'         => 'required|integer|min:1',
                'currency'  => 'required|integer|min:1',
                'gbp_to_mr'  => 'required|integer|min:1',
                //'ac_to_gbp'  => 'required|integer|min:1',
                'total_qty'  => 'required|integer|min:1',
                'recieved_qty'  => 'required|integer|min:1',
                'total_amount'  => 'required|integer|min:1',
                'has_vat_refund'  => 'required|integer',
                'has_loyality'  => 'required|integer',
                //'images'        => 'file|mimes:jpeg,png,jpg,gif',
            ];
        }

        return $rules;
    }
}
