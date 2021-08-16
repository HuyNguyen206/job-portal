<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [JobController::class, 'index']);
Route::get('profile', [UserProfileController::class, 'show'])->name('profile');
Route::put('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
Route::patch('profile/cover-letter', [UserProfileController::class, 'updateCoverLetter'])->name('profile.cover-letter');
Route::patch('profile/resume', [UserProfileController::class, 'updateResume'])->name('profile.resume');
Route::patch('profile/avatar', [UserProfileController::class, 'updateAvatar'])->name('profile.avatar');
Route::view('employer/register', 'auth.employer-register')->name('employer.show-register');
Route::post('employer/register', [EmployerController::class, 'register'])->name('employer.register');
Route::resource('jobs', JobController::class)->except('index');
Route::resource('companies', CompanyController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
