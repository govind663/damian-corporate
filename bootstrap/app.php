<?php

use App\Http\Middleware\PreventBackHistoryMiddleware;
use App\Http\Middleware\PreventCitizenBackHistoryMiddleware;
use App\Http\Middleware\RemoveTrailingSlash;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // === PreventBackHistoryMiddleware
        $middleware->append(PreventBackHistoryMiddleware::class);

        // ==== PreventCitizenBackHistoryMiddleware
        $middleware->append(PreventCitizenBackHistoryMiddleware::class);

        // === RemoveTrailingSlash
        // $middleware->append(RemoveTrailingSlash::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
