<?php

use App\Http\Controllers\MainPlatform\Dashboard\Nav\NavigationController;
use Illuminate\Support\Facades\Route;

// Route::get("/", fn () => "Hello world");
Route::controller(NavigationController::class)->group(function () {
    Route::get("/", "DashboardPage")->name('main.dashboard');
    Route::get("/subscription", "SubscriptionPage")->name('main.dashboard.subscription');
});
