<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    //转数组
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}