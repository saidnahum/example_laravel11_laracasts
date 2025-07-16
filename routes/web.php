<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['greeting' => 'Hello Loco']);
Route::view('/contact', 'contact');

// Job Routes
Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

// Auth Routes
Route::get("/register", [RegisterUserController::class, "create"]);
Route::post("/register", [RegisterUserController::class, "store"]);
Route::get("/login", [SessionController::class, "create"]);
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"]);


//Route::resource('jobs', JobController::class);

