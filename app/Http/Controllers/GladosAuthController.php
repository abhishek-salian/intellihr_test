<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class GladosAuthController extends Controller
{
    /**
     * Performs authentication.
     */
    public function adminLogin(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
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

    public function adminLogout(Request $request) {
        $user = auth()->guard('admin-api')->user();
        if (!is_null($user)) {
            $user->token()->revoke();
        }

        return (new AuthResource(
            null
        ))->response();
    }
}
