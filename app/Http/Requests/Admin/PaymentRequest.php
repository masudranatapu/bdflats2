<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
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
            'customer'                  => 'required',
            //'payment_currency_no'       => 'required|min:1',
            'payment_acc_no'            => 'nullable|min:1',
            'pay_pk_no'                 => 'nullable|min:1',
            'payment_date'              => 'required',
            'payment_amount'            => 'required',
            'ref_number'                => 'required',

        ];

        return $rules;
    }
}
