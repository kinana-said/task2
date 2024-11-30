<?php
use App\Http\Controllers\postcontroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [postcontroller::class,"index"]);
Route::resource('posts',postcontroller::class);
/*
Route::get('/', [postcontroller::class,"index"])->name("posts");
Route::get('/add', [postcontroller::class,"create"])->name("posts.create");
Route::post('/', [postcontroller::class,"store"])->name("posts.store");
Route::put('/', [postcontroller::class,"update"])->name("posts.update");
Route::get('/', [postcontroller::class,"show"])->name("posts.show");
Route::get('/', [postcontroller::class,"edit"])->name("posts.edit");
Route::delete('/', [postcontroller::class,"destroy"])->name("posts.destroy");*/