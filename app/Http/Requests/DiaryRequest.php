<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
        'sleep'=>'required',
        'tired'=>'required',
        'drink'=>'required',
        'hangover'=>'required',
        ];
    }

    public function messages()
    {
        return [
        'sleep.required' => '睡眠状況が空欄です',
        'tired.required' => '疲労度が空欄です',
        'drink.required' => '飲酒量が空欄です',
        'hangover.required' => '二日酔いが空欄です',
        ];
    }
    public function passedValidation()
    {
        // バリデーションが成功した時に実行したい処理
    }
}
