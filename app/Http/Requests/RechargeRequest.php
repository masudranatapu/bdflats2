<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechargeRequest extends FormRequest
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
        $rules = [
            'amount' => 'required|min:1',
            'payment_type' => 'required',
            'attachment' => 'sometimes|file|mimes:jpg,png,jpeg,pdf',
            'payment_date' => 'required|date',
        ];

        if ($this->get('payment_type') == 1) {
            $rules['payment_account'] = 'required';
        }

        return  $rules;
    }



}
