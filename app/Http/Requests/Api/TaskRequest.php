<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Publish_task;

class TaskRequest extends FormRequest
{
    public function rules(){
        return [
            'publish_task' => 'string',
            'id'=>'int'
        ];
    }
    public function messages()
    {
        return [
            'publish_task.string' => '字符串',
        ];
    }
}