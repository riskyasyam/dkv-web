<?php

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [LandingPageController::class, "index"])->name("home");

Route::middleware("guest")->group(function (): void {
    Route::get("/login", [LoginController::class, "show"])->name("login");
    Route::post("/login", [LoginController::class, "store"])->name("login.store");
});

Route::middleware("auth")->group(function (): void {
    Route::post("/logout", [LoginController::class, "destroy"])->name("logout");
    Route::resource("/admin/products", ProductController::class)->except(["show"]);
    Route::resource("/admin/portfolio", PortfolioController::class)->except(["show"])->names("admin.portfolio");
});
