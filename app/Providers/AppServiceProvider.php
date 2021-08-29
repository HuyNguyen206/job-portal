<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        Response::macro('success', function($data, $message = 'success', $status = 200)
        {
            return \response()->json([
                 'data' => $data,
                 'message' => $message,
                 'success' => true,
            ], $status);
        });

        Response::macro('error', function($message = 'error', $status = 500)
        {
            return \response()->json([
                'message' => $message,
                'success' => false
            ], $status);

        });
    }
}
