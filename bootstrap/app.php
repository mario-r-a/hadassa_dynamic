<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // Error jika file terlalu besar (PostTooLargeException)
        $exceptions->render(function (PostTooLargeException $e, $request) {
            return back()
                ->withInput()
                ->with('file_error', 'Ukuran file terlalu besar! Maksimum 5MB.');
        });

    })
    ->create();
