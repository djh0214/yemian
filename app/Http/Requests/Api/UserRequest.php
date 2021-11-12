<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //‘注册’ 规则
    public function rules()
    {
        return [
            'account_number' => 'required|min:5|max:10|string|unique:users,account_number',
            'password' => 'required|alpha_num|min:6',
           'role'=>'required'
        ];

    }

    public function messages()
    {
        return [
            'account_number.required' => '账号必填！',
            'account_number.min' => '账号最小为5位数！',
            'account_number.max' => '账号最大不能超过10位！！',
            'password.required' => '密码必填',
            'password.alpha_num' => '密码只能由字母和数字组成',
            'password.min' => '最小六位数',
            'account_number.unique' => '账号已被注册',
            'role.required'=>'员工or主管or组长必须选'
        ];
    }
}
