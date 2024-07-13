<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ShippingPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            //
        ];
    }
    public function messages()
    {
        return [

            'ShippingPhone.required' => 'Số điện thoại là bắt buộc.',
            'ShippingPhone.regex' => 'Số điện thoại không hợp lệ.',
            'ShippingPhone.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',

        ];
    }
}