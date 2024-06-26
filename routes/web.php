<?php

use App\Http\Controllers\MainPlatform\Auth\AuthController;
use App\Http\Controllers\MainPlatform\Transaction\TenantRegistrationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("/", fn () => Inertia::render("landing_page/central_page/MainMenu"))->name('central.landingPage');
Route::get("/about", fn () => Inertia::render("landing_page/central_page/About"))->name('central.about');

Route::get("/signup", fn () => Inertia::render("landing_page/central_page/SignUp"))->name('central.signup');
Route::get("/login", fn () => Inertia::render("landing_page/central_page/Login"))->name('central.login');
Route::get("/setuptenant", fn () => Inertia::render("landing_page/central_page/SetupTenant"))->name('central.setuptenant');
Route::get("/checkouttenant", fn () => Inertia::render("landing_page/central_page/CheckoutTenant"))->name('central.checkouttenant');

Route::prefix("tenant")->group(function () {
    Route::get("/landing", fn () => Inertia::render("landing_page/tenant_page/TenantHome"))->name('tenant.landingpage');
});


Route::prefix("dashboard")->group(function () {
    Route::middleware(["redirectAuth:central-web"])->controller(AuthController::class)->group(function () {
        route::get("/login", "AuthPage")->name("login");
        route::post("/login", "Authenticable")->name("auth.submit")->middleware(["throttle:central_auth"]);
    });

    Route::middleware(["auth", "role:Super admin|Admin,central-web"])->group(function () {
        Route::post("/logout", [AuthController::class, 'Logout'])->name("central-dashboard.logout");
        require_once __DIR__ . "/dashboard_central/plan_tenant_route.php";
        require_once __DIR__ . "/dashboard_central/navigation_route.php";
    });
});

Route::prefix("transaction")->group(function () {
    Route::controller(TenantRegistrationController::class)->group(function () {
        Route::get('tenant-registration', "RegistrationPage")->name("transaction.tenant-registration");
        Route::post('tenant-registration', 'TenantRegistrationSubmit')->name('transaction.tenant-registration.submit');
    });
});
