<?php

namespace App\Http\Requests;

class ApiDeskListRequest extends ApiRequest
{

    public function rules()
    {
        return [
           'name' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле name обязательно',
        ];
    }
}
