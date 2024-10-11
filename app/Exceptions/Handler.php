<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function(Exception $e, $request) {
            return $this->unauthenticated($request, $e);
         });
 
    }

    public function unauthenticated($request, AuthenticationException $e)
    {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
            if ($request->is('admin') || $request->is('admin/*')) {
                return redirect()->guest('/admin/login');
            }
            //if ($request->is('writer') || $request->is('writer/*')) {
               // return redirect()->guest('/login/writer');
            //}
            return redirect()->guest(route('login'));
    }
}
