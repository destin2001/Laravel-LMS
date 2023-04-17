<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;          
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Builder\Stub;

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

	Route::get('/student-registration', [StudentController::class, 'getRegistration'])->middleware('guest')->name('student-registration');
	Route::post('/student-registration', [StudentController::class, 'postRegistration'])->middleware('guest')->name('student-registration-post');
	Route::get('/book', [BooksController::class, 'searchBook'])->middleware('guest')->name('book');
	// Main books Controlller left public so that it could be used without logging in too
	Route::resource('/books', 'BooksController');
	// Route::resource('/books', BooksController::class)->except(['index']);

	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	// Render Add Books panel
	Route::get('/add-books', [BooksController::class, 'renderAddBooks'])->name('add-books');
	Route::post('/add-book', [BooksController::class, 'store'])->name('add-books.store');
	Route::get('/bookcategory', [BooksController::class, 'renderAddBookCategory'])->name('bookcategory');
	Route::post('/bookcategory', [BooksController::class, 'BookCategoryStore'])->name('bookcategory.store');
	Route::post('/bookcategorydelete/{id}', [BooksController::class, 'destroyCategories'])->name('bookcategory.delete');
	Route::get('/book-categories', [BooksController::class, 'bookCategories'])->name('book-categories');

	// Render All Books panel
	Route::get('/all-books', [BooksController::class, 'renderAllBooks'])->name('all-books');
	Route::get('/bookBycategory/{cat_id}', [BooksController::class, 'BookByCategory'])->name('bookBycategory');

	// Students
	Route::get('/registered-students', [StudentController::class, 'renderStudents'])->name('registered-students');

    // Render students approval panel
	Route::get('/students-for-approval', [StudentController::class, 'renderApprovalStudents'])->name('students-for-approval');
	Route::get('/settings', [StudentController::class, 'renderSetting'])->name('settings');
	Route::get('/setting-all', [StudentController::class, 'Setting'])->name('settings-all');
	Route::post('/setting', [StudentController::class, 'StoreSetting'])->name('settings.store');
	Route::post('/student/{resource}/{id}', [StudentController::class, 'destroy'])->where('resource', '(category|branch)');


	// Main students Controlller resource
	Route::resource('/student', 'StudentController');
	Route::post('/studentByattribute', [StudentController::class, 'StudentByAttribute'])->name('studentByattribute');

    // Issue Logs
	Route::get('/issue-return', [LogController::class, 'renderIssueReturn'])->name('issue-return');

	// Render logs panel
	Route::get('/currently-issued', [LogController::class, 'renderLogs'])->name('currently-issued');

	// Main Logs Controlller resource
	Route::resource('/issue-log', 'LogController');
	// Route::resource('/issue-log', LogController::class)->except(['index']);

	// User Profiles
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});