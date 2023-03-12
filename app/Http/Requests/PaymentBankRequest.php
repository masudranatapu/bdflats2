<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentBankRequest extends FormRequest
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
            'bank_name' => 'required|max:40',
            'bank_acc_name' => 'required|max:40',
            'bank_acc_no' => 'required|max:40',
            'status' => 'required|min:0|max:1',
            'payment_method' => 'required|min:1'
        ];
    }
}
