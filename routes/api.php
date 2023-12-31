<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix("v1")->group(function () {

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('brand', BrandController::class);

        Route::post("logout", [ApiAuthController::class, 'logout']);

        Route::post("logout-all", [ApiAuthController::class, 'logoutAll']);

        Route::get("devices", [ApiAuthController::class, 'devices']);

    });

    Route::post("register", [ApiAuthController::class, 'register']);

    Route::post("login", [ApiAuthController::class, 'login']);

});

Route::prefix("v2")->group(function () {

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('product', ProductController::class);

        Route::post("logout", [ApiAuthController::class, 'logout']);

        Route::post("logout-all", [ApiAuthController::class, 'logoutAll']);

        Route::get("devices", [ApiAuthController::class, 'devices']);

    });

    Route::post("register", [ApiAuthController::class, 'register']);

    Route::post("login", [ApiAuthController::class, 'login']);

});

