<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function (){
            Route::middleware(['api'])
            ->prefix('v1')
            ->group(base_path('routes/v1.php'));

            Route::middleware(['api','auth:sanctum', 'auth.is_admin'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

            Route::middleware('web')
            ->group(base_path('routes/web.php'));

        },
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
           'cors' => \App\Http\Middleware\HandleCorsMiddleware::class,
            'auth.is_admin' => \App\Http\Middleware\AuthCheckMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $api = new \App\ApiObject();
        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $exception, $request) use($api){
            return $api->errorResponse('Unauthenticated', [$exception->getMessage()], 401);
        });
        $exceptions->render(function (\Symfony\Component\Routing\Exception\RouteNotFoundException $exception) use($api){
            return $api->errorResponse($exception->getMessage());
        });
        $exceptions->render(function (\Illuminate\Database\QueryException $exception) use($api){
            return $api->errorResponse('sql query error!', [$exception->getMessage()], 500);
        });
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception) use($api){
            return $api->errorResponse('not found!', [$exception->getMessage()], 404);
        });
        $exceptions->render(function (InvalidArgumentException $exception) use($api){
            return $api->errorResponse('data not found!', [$exception->getMessage()], 404);
        });

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $exception) use($api){
            return $api->errorResponse('method not allowed!', [$exception->getMessage()], 405);
        });
    })->create();
