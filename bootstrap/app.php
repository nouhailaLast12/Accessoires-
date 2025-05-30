<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__)) // Set the base path for the application
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Define the web routes file
        commands: __DIR__.'/../routes/console.php', // Define the console commands file
        health: '/up', // Define the health check endpoint
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Appending CORS middleware to handle cross-origin requests
        $middleware->append(\Illuminate\Http\Middleware\HandleCors::class); 
        // You can add more middleware here if needed, for example:
        // $middleware->prepend(SomeOtherMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Customize how exceptions are handled, for example:
        // $exceptions->register(function ($exception) {
        //     // custom exception handling logic
        // });
    })
    ->create(); // Finalize and create the application instance
