<?php

namespace App\Exceptions;

use App\HelpersClasses\MessagesFlash;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
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
            if ($e instanceof ValidationException) {
                MessagesFlash::Errors($e->errors());
                return \redirect()->back();
            }
            if ($e instanceof AuthenticationException) {
                MessagesFlash::Errors($e->getMessage());
                return \redirect()->route("login");
            }
            if ($e instanceof NotFoundHttpException || $e instanceof ModelNotFoundException)
                return response()->view("404");
            if ($e instanceof AccessDeniedHttpException)
                return response()->view("403");
            dd($e);
        });
    }
}
