<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminAkses;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {

        $middleware->alias([
            'adminakses' => \App\Http\Middleware\AdminAkses::class,
            'pengelolaakses' => \App\Http\Middleware\PengelolaAkses::class,
        ]);
        // $middleware->add(UserAkses::class);
        // $middleware->web(append: [UserAkses::class]);


    })

     ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
