<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('admin-login', [AuthController::class, 'adminLogin'])->name('login.admin');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('admin-registration', [AuthController::class, 'adminRegistration'])->name('register.admin');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('user_register', [AuthController::class, 'userregister'])->name('user_register');
Route::post('user_register', [AuthController::class, 'userRegistration'])->name('user_register');
Route::post('user_register_create', [AuthController::class, 'userregistercreate'])->name('user_register_create');
Route::post('get-cities-by-state', [AuthController::class, 'getCity'])->name('get-cities-by-state');

Route::get('view-all-information/{id}', [AuthController::class, 'allInformation'])->name('view-all-information');
Route::get('user-edit/{id}', [AuthController::class, 'editNewUser'])->name('user-edit');
Route::delete('user-delete/{id}', [AuthController::class, 'destroy'])->name('user-delete');

Route::delete('delete-image/{id}', [AuthController::class, 'deleteimg'])->name('delete-image');

Route::put('/update-user/{id}', [AuthController::class, 'update'])->name('update-user');

// Route::post('/livetable/delete_data' , 'AuthController@delete_data')->name('skills.delete_data');
Route::delete('user-edit/skill/{id}', [AuthController::class, 'deleteskill'])->name('delete-skill');
// Route::delete('user-edit/img/{id}', [AuthController::class, 'deleteimg'])->name('delete-img');


// Route::delete('skill/{id}', 'UserController@destroy')->name('users.destroy');






