<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Report;

class TopicRequest extends FormRequest
{
    public function rules(){
        return [
//            'daily' => 'string',
//            'weekly' => 'string',
//            'monthly' => 'string',
        ];
    }
    public function messages()
    {
        return [
            'daily.string' => '字符串',
            'weekly.string' => '字符串',
            'monthly.string' => '字符串',
        ];
    }
}