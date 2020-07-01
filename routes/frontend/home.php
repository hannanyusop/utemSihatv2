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
Route::get('/join-us', [HomeController::class, 'inviteFriend'])->name('invite-friend');
Route::get('/food-search', [HomeController::class, 'foodSearch'])->name('food-search');
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
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::post('account', [AccountController::class, 'update'])->name('update');
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::group(['middleware' => 'check_info'], function () {

            Route::group(['prefix' => 'meal/', 'as' => 'meal.'], function (){

                Route::get('today', [MealController::class, 'today'])->name('today');
                Route::get('today/{id}', [MealController::class, 'todayView'])->name('today-view');
                Route::post('today/{id}/add', [MealController::class, 'todayAddItem'])->name('today-add-item');
                Route::get('today/{id}/remove/{item_id}', [MealController::class, 'todayRemoveItem'])->name('today-remove-item');
                Route::post('add-group', [MealController::class, 'addMealGroup'])->name('add-group');

            });

            Route::group(['prefix' => 'food', 'as' => 'food.'], function (){

                Route::get('', [FoodController::class, 'index'])->name('index');
                Route::get('search', [FoodController::class, 'search'])->name('serach');

            });

            Route::group(['prefix' => 'report', 'as' => 'report.'], function (){

                Route::get('', [ReportController::class, 'index'])->name('index');

            });

            Route::group(['prefix' => 'account/', 'as' => 'account.'], function (){

                Route::get('location', [AccountController::class, 'location'])->name('location');
                Route::post('location', [AccountController::class, 'locationUpdate'])->name('location-update');

                Route::get('update-password', [AccountController::class, 'UpdatePasswordForm'])->name('update-password-form');
                Route::post('update-password', [AccountController::class, 'UpdatePassword'])->name('update-password');
            });

        });



    });
});
