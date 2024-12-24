<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class,"showloginForm"])->name("login");
Route::post('/', [AuthController::class,"login"])->name("login");

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class,"logout"])->name("logout");
    Route::resource('posts',PostController::class);
    Route::resource('users',UserController::class);
});


/*Route::get('/', [PostController::class,"index"]);*/
/*
Route::get('/', [postcontroller::class,"index"])->name("posts");
Route::get('/add', [postcontroller::class,"create"])->name("posts.create");
Route::post('/', [postcontroller::class,"store"])->name("posts.store");
Route::put('/', [postcontroller::class,"update"])->name("posts.update");
Route::get('/', [postcontroller::class,"show"])->name("posts.show");
Route::get('/', [postcontroller::class,"edit"])->name("posts.edit");
Route::delete('/', [postcontroller::class,"destroy"])->name("posts.destroy");*/
