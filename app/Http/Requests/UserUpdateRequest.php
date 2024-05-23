<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'password.required' => 'パスワードが空欄です',
        ];

    }
    public function passedValidation()
    {
        // バリデーションが成功した時に実行したい処理
    }
}

