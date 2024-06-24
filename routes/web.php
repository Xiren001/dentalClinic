<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/service', function () {
    return view('service');
})->name('service');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('patients', PatientController::class);
Route::resource('employees', EmployeeController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/appointment', function () {
    return view('admins.appointment');
})->middleware(['auth', 'verified'])->name('appointment');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
