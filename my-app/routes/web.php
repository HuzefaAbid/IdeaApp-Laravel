<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\ideaController;
use Illuminate\Support\Facades\Route;

// Static Pages
Route::view("/", "home");
Route::view("about", "about-us");
Route::view("contact", "contact");


Route::middleware('auth')->group(function () {
    Route::get("/ideas", [ideaController::class, 'index'])->name('ideas.index');
    Route::get("/ideas/create", [ideaController::class, 'create'])->name('ideas.create');
    Route::post("/ideas", [ideaController::class, 'store'])->name('ideas.store');
    Route::get("/ideas/{idea}", [ideaController::class, 'show'])->name('ideas.show');
    Route::get("/ideas/{idea}/edit", [ideaController::class, 'edit'])->name('ideas.edit');
    Route::patch("/ideas/{idea}", [ideaController::class, 'update'])->name('ideas.update');
    Route::delete("/ideas/{idea}", [ideaController::class, 'destroy'])->name('ideas.delete');

    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get("/login", [SessionController::class, 'create'])->name('login');
    Route::post("/login", [SessionController::class, 'store'])->name('store');
});
