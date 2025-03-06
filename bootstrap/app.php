<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure($basePath = dirname(__DIR__))
    ->withRouting()
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('web', [\Infrastructure\Http\HandleHybridRequests::class]);        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create()
    ->useAppPath($basePath . '/src/Modules');
