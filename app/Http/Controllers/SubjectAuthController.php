<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class SubjectAuthController extends Controller
{
    /**
     * Performs authentication.
     */
    public function subjectLogin(Request $request)
    {
        if(Auth::guard('subject-api')->attempt(['id' => $request->username, 'password' => $request->password])){
            $user = Auth::user();

            return (new AuthResource(
                $user
            ))->response();
        }

        return (new ErrorResource(
            Response::HTTP_UNAUTHORIZED,
            'Invalid username password',
            'UNAUTHENTICATED'
        ))->response()->setStatusCode(Response::HTTP_UNAUTHORIZED);
    }

    public function subjectLogout(Request $request) {
        $user = auth()->guard('subject-api')->user();
        if (!is_null($user)) {
            $user->token()->revoke();
        }

        return (new AuthResource(
            null
        ))->response();
    }
}
