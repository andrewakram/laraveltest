<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'is_captin' => 'required',

        ];
    }

    function messages()
    {
        return [
            'email.required' => trans('validation.email'),
            'password.required' => trans('validation.password'),
            'name.required' => trans('validation.name'),
            'phone.required' => trans('validation.phone'),
            'is_captin.required' => trans('validation.is_captin'),

        ];
    }
}
