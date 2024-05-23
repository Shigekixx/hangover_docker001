<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array  //名前・メールアドレス・パスワードは空欄で出せないようにする
    {
        return [
            'name'=>'required',
            'account'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required',
        ];
    }
    
    public function messages()
    {
        return[
            'name.required' => '氏名が空欄です',
            'account.required' => 'アカウント名が空欄です',
            'account.unique'=>'このアカウント名はすでに使用されています',
            'email.required' => 'メールアドレスが空欄です',
            'email.unique'=>'このメールアドレスはすでに使用されています',
            'password.required' => 'パスワードが空欄です',
        ];
    }
    public function passedValidation()
    {
        // バリデーションが成功した時に実行したい処理
    }
}

//Models名.phpに変更する


