<?php

namespace App\Exceptions;

use App\Http\Resources\ErrorResource;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return (new ErrorResource(
                Response::HTTP_BAD_REQUEST,
                'Not Found',
                'NOT_FOUND'
            ))->response()->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof AuthorizationException && $request->wantsJson()) {
            return (new ErrorResource(
                Response::HTTP_FORBIDDEN,
                'This action is unauthorized.',
                'PERMISSION_DENIED'
            ))->response()->setStatusCode(Response::HTTP_FORBIDDEN);
        }

        return parent::render($request, $exception);
    }
}
