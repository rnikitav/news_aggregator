<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChmodUser extends FormRequest
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
        return [
            'is_admin' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно заполнить',
            'boolean'  => 'Поле :attribute должно быть выбрано 0 не админ 1 - админ'
        ];
    }
    public function attributes()
    {
        return [
            'is_admin' => 'Права пользователя',
        ];
    }
}
