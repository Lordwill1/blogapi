<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Initialize the Laravel Application
return Application::configure(basePath: dirname(__DIR__))
    // Load routing files
    ->withRouting(
        web: __DIR__.'/../routes/web.php',       // Web routes
        api: __DIR__.'/../routes/api.php',       // API routes
        commands: __DIR__.'/../routes/console.php', // Console routes
        health: '/up'                            // Health check endpoint
    )
    // Middleware configuration
    ->withMiddleware(function (Middleware $middleware) {
        // Add global or custom middleware here
        // Example: $middleware->add(\App\Http\Middleware\CheckForMaintenanceMode::class);
    })
    // Exception handling configuration
    ->withExceptions(function (Exceptions $exceptions) {
        // Customize exception handling if needed
        // Example: $exceptions->reportUsing(\App\Exceptions\Handler::class);
    })
    ->create(); // Finalize and create the application instance
