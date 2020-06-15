<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\MealController;
use App\Http\Controllers\Frontend\User\FoodController;
use App\Http\Controllers\Frontend\User\ReportController;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::post('account', [AccountController::class, 'update'])->name('update');
        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'meal/', 'as' => 'meal.'], function (){

            Route::get('today', [MealController::class, 'today'])->name('today');
            Route::get('today/{id}', [MealController::class, 'todayView'])->name('today-view');
            Route::post('today/{id}/add', [MealController::class, 'todayAddItem'])->name('today-add-item');
            Route::get('today/{id}/remove/{item_id}', [MealController::class, 'todayRemoveItem'])->name('today-remove-item');
            Route::post('add-group', [MealController::class, 'todayRemoveItem'])->name('add-group');

        });

        Route::group(['prefix' => 'food', 'as' => 'food.'], function (){

            Route::get('', [FoodController::class, 'index'])->name('index');

        });

        Route::group(['prefix' => 'report', 'as' => 'report.'], function (){

            Route::get('', [ReportController::class, 'index'])->name('index');

        });

    });
});
