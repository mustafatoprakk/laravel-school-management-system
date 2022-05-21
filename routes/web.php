<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $data["title"] = "Home";
    return view('home', $data);
})->name("home")->middleware("auth");

Route::get("profile", [UserController::class, "profile"])->name("profile")->middleware("auth");
Route::post("profile", [UserController::class, "profileUpdate"])->name("profile_update");

Route::get("login", [UserController::class, "login"])->name("login");
Route::post("login", [UserController::class, "login_action"])->name("login_action");

Route::get("logout", [UserController::class, "logout"])->name("logout")->middleware("auth");

// course
Route::get("course", [CourseController::class, "index"])->name("course")->middleware("auth");
Route::get("course-create", [CourseController::class, "create"])->name("course_create")->middleware("auth");
Route::post("course-create", [CourseController::class, "store"])->name("course_store");
Route::get("course-update/{id}", [CourseController::class, "edit"])->name("course_edit")->middleware("auth");
Route::post("course-update", [CourseController::class, "update"])->name("course_update");