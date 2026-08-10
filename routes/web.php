<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;




Route::middleware('auth')->group(function () {
    Route::get('/', [ DashboardController::class,'index'])->name('dashboard');
    Route::get('/company', [ CompanyController::class,'index'])->name('company.index');
    Route::get('/job-application', [ JobApplicationController::class,'index'])->name('application.index');
    Route::get('/job-category', [ JobCategoryController::class,'index'])->name('job-category.index');
    Route::get('/job-vacancy', [ JobVacancyController::class,'index'])->name('job-vacancy.index');
    Route::get('/user', [ UserController::class,'index'])->name('user.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
