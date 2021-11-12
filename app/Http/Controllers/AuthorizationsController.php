<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AuthenticationException;
use App\Models\User;

class AuthorizationsController extends Controller
{

    public function update()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        auth('api')->logout();
        return response(null, 204);
    }
}
