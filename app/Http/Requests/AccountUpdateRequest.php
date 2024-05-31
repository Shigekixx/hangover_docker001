<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'account' => 'required|unique:users,account' . $this->user,
            'email' => 'required|unique:users,email,' . $this->user,
        ];
    }

    public function messages()
    {
        return [
            'account.required' => 'アカウント名が空欄です',
            'account.unique' => 'このアカウント名はすでに使用されています',
            'email.required' => 'メールアドレスが空欄です',
            'email.unique' => 'このメールアドレスはすでに使用されています',
        ];
    }
    
}