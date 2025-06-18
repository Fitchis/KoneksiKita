<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TemplateRequestController;

Route::view('/', 'welcome')->name('welcome');

Route::view('/Tentang-Kami', 'cara-kerja')->name('cara-kerja');

Route::view('/papan-acara', 'papan-acara')->name('papan-acara');

Route::view('/katalog/sponsor', 'katalog.sponsor')->name('katalog.sponsor');
//  middleware 'role.perusahaan, superadmin' 
Route::middleware(['auth'])->group(function () {
    Route::get('/katalog/add-form/add-sponsor', function () {

        if (Auth::user()->role !== 'perusahaan' && Auth::user()->role !== 'superadmin') {
            abort(403, 'Unauthorized action.');
        }
        return view('katalog.add-form.add-sponsor');
    })->name('katalog.add-sponsor');
});

Route::get('/katalog/sponsor', [SponsorController::class, 'index'])->name('katalog.sponsor');
Route::post('/sponsor/store', [SponsorController::class, 'store'])->name('sponsor.store');
Route::get('/katalog/sponsor/{id}', function ($id) {
    $sponsor = App\Models\Sponsor::findOrFail($id);
    return view('katalog.sponsor-show', compact('sponsor'));
})->name('sponsor.show');


Route::get('/katalog/event', [EventController::class, 'index'])->name('katalog.event');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('katalog.event.edit');
Route::put('/event/{id}', [EventController::class, 'update'])->name('katalog.event.update');

//  middleware 'role.mahasiswa, superadmin' 
Route::middleware(['auth'])->group(function () {
    Route::get('/katalog/add-form/add-event', function () {
        if (Auth::user()->role !== 'mahasiswa' && Auth::user()->role !== 'superadmin') {
            abort(403, 'Unauthorized action.');
        }
        return view('katalog.add-form.add-event');
    })->name('katalog.add-event');
});;
Route::resource('event', EventController::class)->middleware('auth');


Route::post('/request-template', [TemplateRequestController::class, 'store'])->name('request-template');


Route::middleware('auth')->group(function () {
    Route::get('/akun', [AccountController::class, 'edit'])->name('akun');
    Route::post('/akun', [AccountController::class, 'update'])->name('akun.update');
    Route::delete('/akun', [AccountController::class, 'destroy'])->name('akun.destroy')->middleware('auth');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/dashboard/event/{id}/edit', [DashboardController::class, 'editEvent'])->name('dashboard.event.edit');
Route::put('/dashboard/event/{id}', [DashboardController::class, 'updateEvent'])->name('dashboard.event.update');
Route::delete('/dashboard/event/{id}', [DashboardController::class, 'deleteEvent'])->name('dashboard.event.delete');

// Update User
Route::put('/user/{id}', [DashboardController::class, 'updateUser'])->name('users.update');
Route::delete('/user/{id}', [DashboardController::class, 'destroyUser'])->name('users.destroy');
Route::put('/dashboard/sponsor/{id}', [DashboardController::class, 'updateSponsor'])->name('sponsor.update');
Route::delete('/dashboard/sponsor/{id}', [DashboardController::class, 'deleteSponsor'])->name('sponsor.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

require __DIR__ . '/auth.php';
