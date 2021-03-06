<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report to an external service or log an exception.
     *
     * @param Exception $exception
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request $request
     * @param Exception                 $exception
     *
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof TokenBlacklistedException) {
            return response(['error'=>'This token cannot be used, get a new one'], 400);
        }
        else if ($exception instanceof TokenExpiredException){
            return response(['error'=>'Token has expired, please login again'], 400);
        }
        else if ($exception instanceof TokenInvalidException){
            return response(['error'=>'Token invalid'], 400);
        }
        else if ($exception instanceof JWTException){
            return response(['error'=>'Token not provided'], 400);
        }

        return parent::render($request, $exception);
    }
}
