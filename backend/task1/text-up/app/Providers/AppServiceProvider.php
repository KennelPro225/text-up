<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
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
        //Macro
        Response::macro('success', function (string $message = '', $data = []) : JsonResponse {
            return response()->json([
                'error' => false,
                'message' => $message,
                'data' => $data
            ], 200);
        });

        Response::macro('error', function (string $message = '', $data = []) : JsonResponse {
            return response()->json([
                'error' => true,
                'message' => $message,
                'data' => $data
            ], 422);
        });
    }
}
