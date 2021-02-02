<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class CaptinCompleteRegisterReuest extends Request
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
            'driving_license' => 'required',
            'id_front' => 'required',
            'id_back' => 'required',
            'car_license_front' => 'required',
            'car_license_back' => 'required',
            'feesh' => 'required',
            'car_color' => 'required',
            'car_num' => 'required',
            'car_model' => 'required',
        ];
    }

    function messages()
    {
        return [
            'driving_license.required' => trans('validation.driving_license'),
            'id_front.required' => trans('validation.id_front'),
            'id_back.required' => trans('validation.id_back'),
            'car_license_front.required' => trans('validation.car_license_front'),
            'car_license_back.required' => trans('validation.car_license_back'),
            'feesh.required' => trans('validation.feesh'),
            'car_color.required' => trans('validation.car_color'),
            'car_num.required' => trans('validation.car_num'),
            'car_model.required' => trans('validation.car_model'),
        ];
    }
}
