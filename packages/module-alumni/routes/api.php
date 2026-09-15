<?php

use Illuminate\Support\Facades\Route;
use Znu\ModuleAlumni\Http\Controllers\AlumniProfileController;
use Znu\ModuleAlumni\Http\Controllers\EventController;
use Znu\ModuleAlumni\Http\Controllers\VacancyController;
use Znu\ModuleAlumni\Http\Controllers\StoryController;

Route::middleware('auth')->group(function () {
    // Alumni Profiles
    Route::post('/profiles', [AlumniProfileController::class, 'store']);
    Route::get('/profiles', [AlumniProfileController::class, 'index']);

    // Events
    Route::get('/events', [EventController::class, 'index']);
    Route::post('/events', [EventController::class, 'store']);
    Route::post('/events/{event}/register', [EventController::class, 'register']);

    // Vacancies
    Route::get('/vacancies', [VacancyController::class, 'index']);
    Route::post('/vacancies', [VacancyController::class, 'store']);

    // Stories
    Route::get('/stories', [StoryController::class, 'index']);
    Route::post('/stories', [StoryController::class, 'store']);
});

