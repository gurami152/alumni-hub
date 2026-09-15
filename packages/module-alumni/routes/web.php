<?php

use Illuminate\Support\Facades\Route;

// 1. PUBLIC ROUTES (No Auth Required)
Route::middleware(['web'])->group(function () {
    Route::get('/register', function () {
        // Fetch departments dynamically in a real app
        $departments = \Znu\Core\Models\Department::all() ?? [];
        return inertia('Public/Register', ['departments' => $departments]);
    });

    Route::get('/events', function () {
        return inertia('Public/Events');
    });

    Route::get('/vacancies', function () {
        return inertia('Public/Vacancies');
    });

    Route::get('/mentorship', function () {
        return inertia('Public/Mentorship');
    });

    Route::get('/learning', function () {
        return inertia('Public/LifelongLearning');
    });

    Route::get('/contact', function () {
        return inertia('Public/Contact');
    });
});

// 2. ALUMNI ROUTES (Auth Required, Alumni Role)
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/alumni/dashboard', function () {
        $profile = \Znu\ModuleAlumni\Models\AlumniProfile::where('user_id', auth()->id())->first() ?? ['status' => 'verified'];
        return inertia('Alumni/Dashboard', ['profile' => $profile]);
    });
});

// 3. ADMIN ROUTES (Auth Required, CRM Access)
Route::middleware(['web', 'auth'])->name('module.alumni.')->prefix('admin/alumni')->group(function () {
    Route::get('/', function() {
        return \Inertia\Inertia::render('ModuleAlumni::AlumniProfile/Index');
    })->name('index');

    Route::get('/events', function() {
        return \Inertia\Inertia::render('ModuleAlumni::Event/Index');
    })->name('events');

    Route::get('/vacancies', function() {
        return \Inertia\Inertia::render('ModuleAlumni::Vacancy/Index');
    })->name('vacancies');

    Route::get('/stories', function() {
        return \Inertia\Inertia::render('ModuleAlumni::Story/Index');
    })->name('stories');

    Route::get('/mentorship', function() {
        return \Inertia\Inertia::render('ModuleAlumni::Mentorship/Index');
    })->name('mentorship');
});
