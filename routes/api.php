<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AdminController::class)->group(function () {
    Route::post("/login", "login");
    Route::middleware("auth:sanctum")->get("/logout", "logout");
});

Route::middleware("auth:sanctum")->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get("/productList", "indexList");
        Route::delete("/product/{product}", "destroy");
        Route::post("/product/{product}", "update");
        Route::post("/product", "store");
    });
    Route::controller(PricingController::class)->group(function () {
        Route::delete("/pricing/{pricing}", "destroy");
        Route::post("/product/{product}/pricing", "store");
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get("/order/{order}/product", "showProduct");
        Route::get("/order", "index");
        Route::delete("/order/{order}", "destroy");
        Route::get("/order/{order}", "show");

    });
});


Route::post("/order", [OrderController::class, "store"]);
Route::controller(ProductController::class)->group(function () {
    Route::get("/product", "index");
    Route::get("/product/{product}", "show");
});
