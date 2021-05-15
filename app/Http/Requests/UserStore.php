<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => 'nullable|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'is_admin' => 'nullable|boolean',
            'phone' => 'nullable|numeric',
            'gender' =>'nullable|in:m,f',
            'birthday' => 'nullable|date_format:Y-m-d',
            'hometown' => 'nullable|string',
            'photo' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'in' => 'Возможные значения для поля :attribute f - Женский m - Мужской',
        ];
    }
}
