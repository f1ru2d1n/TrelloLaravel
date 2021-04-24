<?php

namespace App\Http\Requests;

class ApiPassportRequest extends ApiRequest
{

    public function rules()
    {
        return [
           'name' => 'required|min:3',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле name обязательно',
            'email.required' => 'Поле email обязательно',
            'password.required' => 'Поле password обязательно',
        ];
    }
}
