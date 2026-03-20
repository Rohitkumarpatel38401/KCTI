<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainSite\HomeController;
use App\Http\Controllers\MainSite\CoursesController;
use App\Http\Controllers\MainSite\FranchiseController; // bad me krna hai

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',          [HomeController::class,      'index'])->name('main.home');
Route::get('/about', function(){ 
        return view('main_site.pages.about'); })->name('main.about');
Route::get('/courses',   [CoursesController::class,   'index'])->name('main.courses');
Route::get('/contact', function(){ 
        return view('main_site.pages.contact'); })->name('main.contact');
Route::get('/placement', function(){ 
        return view('main_site.pages.placement'); })->name('main.placement');
Route::get('/gallery', function(){ 
        return view('main_site.pages.gallery'); })->name('main.gallery');

Route::prefix('students')->name('main.students.')->group(function () {
        Route::get('/registration', function(){ 
                return view('main_site.pages.students.registration'); })->name('registration');
        // Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
        Route::get('/verification', function(){ 
                return view('main_site.pages.students.verification');})->name('verification');
        // Route::post('/verification', [VerificationController::class, 'check'])->name('verification.check');
});

Route::prefix('franchise')->name('main.franchise.')->group(function () {
        Route::get('/info',   function(){ 
                return view('main_site.pages.franchise.info');})->name('info');
        Route::get('/apply',   function(){ 
                return view('main_site.pages.franchise.apply');})->name('apply');
        Route::post('/apply', [FranchiseController::class, 'store'])->name('apply.store');
    });
