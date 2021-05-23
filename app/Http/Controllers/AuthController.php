<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    /**
     * Performs authentication.
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token =  $user->createToken(Config::get('app.name'))->accessToken;

            return (new AuthResource(
                $user,
                $token
            ))->response();
        }

        return (new ErrorResource(
            Response::HTTP_UNAUTHORIZED,
            'Invalid username password',
            'UNAUTHENTICATED'
        ))->response()->setStatusCode(Response::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request) {
        $user = auth()->guard('api')->user();
        if (!is_null($user)) {
            $user->token()->revoke();
        }

        return (new AuthResource(
            null
        ))->response();
    }
}
