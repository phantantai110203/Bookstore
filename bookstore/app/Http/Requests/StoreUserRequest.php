<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'address' => ['required'],
            'password' => ['required'],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Tên không được bỏ trống',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'password.required' => 'Không được bỏ trống',
        ];
    }
}