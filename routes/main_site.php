<?php
/*
|----------------------------------------------------------------------
| routes/main_site.php
|----------------------------------------------------------------------
| Ye file web.php mein include karo:
|   require base_path('routes/main_site.php');
|----------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainSite\HomeController;
// use App\Http\Controllers\MainSite\AboutController;
use App\Http\Controllers\MainSite\CoursesController;
use App\Http\Controllers\MainSite\PlacementController;
use App\Http\Controllers\MainSite\GalleryController;
use App\Http\Controllers\MainSite\DownloadController;
use App\Http\Controllers\MainSite\ContactController;
use App\Http\Controllers\MainSite\Students\RegistrationController;
use App\Http\Controllers\MainSite\Students\VerificationController;
use App\Http\Controllers\MainSite\Franchise\FranchiseInfoController;
use App\Http\Controllers\MainSite\Franchise\FranchiseApplyController;

Route::middleware(['web'])->group(function () {

    Route::get('/',          [HomeController::class,      'index'])->name('main.home');
    Route::get('/about', function(){ 
        return view('main_site.about');
    })->name('main.about');
    Route::get('/courses',   [CoursesController::class,   'index'])->name('main.courses');
    Route::get('/placement', [PlacementController::class, 'index'])->name('main.placement');
    Route::get('/gallery',   [GalleryController::class,   'index'])->name('main.gallery');
    Route::get('/download',  [DownloadController::class,  'index'])->name('main.download');
    Route::get('/contact',   [ContactController::class,   'index'])->name('main.contact');
    Route::post('/contact',  [ContactController::class,   'submit'])->name('main.contact.submit');

    Route::prefix('students')->name('main.students.')->group(function () {
        Route::get('/registration',  [RegistrationController::class, 'index'])->name('registration');
        Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
        Route::get('/verification',  [VerificationController::class, 'index'])->name('verification');
        Route::post('/verification', [VerificationController::class, 'check'])->name('verification.check');
    });

    Route::prefix('franchise')->name('main.franchise.')->group(function () {
        Route::get('/info',   [FranchiseInfoController::class,  'index'])->name('info');
        Route::get('/apply',  [FranchiseApplyController::class, 'index'])->name('apply');
        Route::post('/apply', [FranchiseApplyController::class, 'store'])->name('apply.store');
    });

});
