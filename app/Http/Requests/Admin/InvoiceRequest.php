<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceRequest extends FormRequest
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
            'invoice_no'            => 'required|min:1',
            'payment_source'        => 'required|min:1',
            'acc_bank'              => 'required|min:1',
            'payment_methods'       => 'required|min:1',
            'invoice_date'          => 'required',
            'vendor'                => 'required|integer|min:1',
            'purchaser'             => 'required|integer|min:1',
            'currency'              => 'required|integer|min:1',
            'gbp_to_mr'             => 'required',
            'invoice_exact_value'   => 'required',
            //'ac_to_gbp'           => 'required|integer|min:1',
            //'total_qty'             => 'required|integer|min:1',
           // 'recieved_qty'          => 'required|integer|min:1',
           // 'total_amount'          => 'required',
            //'has_vat_refund'        => 'required|integer',
            // 'has_loyality'          => 'required|integer',
            //'images'              => 'file|mimes:jpeg,png,jpg,gif',
        ];

        return $rules;
    }
}
