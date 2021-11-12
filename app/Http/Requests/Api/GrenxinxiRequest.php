<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class GrenxinxiRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'name' => 'required|max:5|min:2',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => '名字必填！',
            'name.min' => '名字最小为2位数！',
            'name.max' => '名字最大不能超过5位！！',

        ];
    }
}