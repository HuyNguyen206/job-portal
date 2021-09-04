<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TetimonialController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('profile', [UserProfileController::class, 'show'])->name('profile');
Route::put('profile/update', [UserProfileController::class, 'update'])->name('profile.update');
Route::patch('profile/cover-letter', [UserProfileController::class, 'updateCoverLetter'])->name('profile.cover-letter');
Route::patch('profile/resume', [UserProfileController::class, 'updateResume'])->name('profile.resume');
Route::patch('profile/avatar', [UserProfileController::class, 'updateAvatar'])->name('profile.avatar');
Route::post('apply-job/{job}', [UserProfileController::class, 'applyJob'])->name('seeker.apply-job');
Route::view('employer/register', 'auth.employer-register')->name('employer.show-register');
Route::post('employer/register', [EmployerController::class, 'register'])->name('employer.register');
Route::get('jobs/my-saved-job', [UserProfileController::class, 'getSavedJobs'])->name('jobs.saved-job');
Route::post('jobs/favorite/{job}', [UserProfileController::class, 'toogleFavotiteJob']);
Route::get('jobs/my-job', [JobController::class, 'getMyJob'])->name('jobs.my-job');
Route::get('jobs/get-all-job', [JobController::class, 'getAllJob'])->name('jobs.get-all-job');
Route::resource('jobs', JobController::class)->except('index', 'show');
Route::get('jobs/detail/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::post('jobs/search-job', [JobController::class, 'searchJob']);
Route::post('jobs/sent-to-friend', [JobController::class, 'sendToFriend'])->name('jobs.sent-to-friend');
Route::get('jobs/toggle-status/{job}', [JobController::class, 'toggleStatus'])->name('jobs.toggle-status');
Route::resource('companies', CompanyController::class);

Route::get('categories/index/{category}', [CategoryController::class, 'index'])->name('categories.index');

Route::get('companies/profile/{company}',[CompanyController::class, 'showDetail'])->name('companies.profile');
//Route::put('companies/update', [UserProfileController::class, 'update'])->name('companies.update');
Route::patch('companies/{company}/logo', [CompanyController::class, 'updateLogo'])->name('companies.logo');
Route::patch('companies/{company}/cover-photo', [CompanyController::class, 'updateCoverPhoto'])->name('companies.cover-photo');
Route::get('companies/jobs/{job}', [CompanyController::class, 'getApplicant'])->name('companies.applicant');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [DashBoardController::class, 'index'])->name('dashboard');
Route::get('dashboard/posts/create', [DashBoardController::class, 'create'])->name('dashboard.create');
Route::post('dashboard/posts', [DashBoardController::class, 'store'])->name('dashboard.store');

Route::delete('dashboard/posts/{post}', [DashBoardController::class, 'delete'])->name('dashboard.delete');
Route::get('dashboard/posts/{post}', [DashBoardController::class, 'edit'])->name('dashboard.edit');
Route::put('dashboard/posts/{post}', [DashBoardController::class, 'update'])->name('dashboard.update');
Route::get('dashboard/trash', [DashBoardController::class, 'getTrashPost'])->name('dashboard.trash');
Route::delete('dashboard/posts/force-delete/{post}', [DashBoardController::class, 'forceDeletePost'])->name('dashboard.forceDelete');
Route::get('dashboard/posts/restore/{slug}', [DashBoardController::class, 'restorePost'])->name('dashboard.restorePost');
Route::get('dashboard/posts/toggle/{post}', [DashBoardController::class, 'toggleStatus'])->name('dashboard.toggleStatus');

Route::get('home/posts/{post}', [HomeController::class, 'showPost'])->name('home.show-post');

Route::get('dashboard/testimonials', [TetimonialController::class, 'index'])->name('testial');
Route::get('dashboard/testimonials/create', [TetimonialController::class, 'create'])->name('testial.create');
Route::post('dashboard/testimonials', [TetimonialController::class, 'store'])->name('testial.store');
Route::delete('dashboard/testimonials/{testimonial}', [TetimonialController::class, 'delete'])->name('testial.delete');
Route::get('dashboard/testimonials/{testimonial}', [TetimonialController::class, 'edit'])->name('testial.edit');
Route::put('dashboard/testimonials/{testimonial}', [TetimonialController::class, 'update'])->name('testial.update');


