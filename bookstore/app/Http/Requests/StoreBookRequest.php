<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            // 'name' => ['required', 'unique'],
            // 'description' => ['required'],
            // 'publish_date' => ['required'],
            // 'price' => ['required', 'numeric', 'integer', 'min:0'],
            // 'quality' => ['required' ,'numeric'],
            // 'img' => ['required', 'mimes: jpg, png, bmp']
            //
        ];
    }
    public function messages()
    {
        return [
            // 'name.required' => 'Tên không được bỏ trống',
            // 'description.required' => 'Không được bỏ trống.',
            // 'publish_date.required' => 'Không được bỏ trống..',
            // 'price.required' => 'Giá tiền là bắt buộc.',
            // 'price.numeric' => 'Giá tiền là một số .',
            // 'price.integer' => 'Giá tiền là một số nguyên',
            // 'quality.required' => 'Không được bỏ trống',
            // 'quality.numeric' => 'Hãy nhập số lượng chính xác',
            // 'img.required' => 'Không được bỏ trống',
            // 'img.mimes' => 'Chỉ hổ trợ tệp jpg, png, bmp',
        ];
    }
}