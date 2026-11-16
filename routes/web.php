
<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Auth::routes();

// Admin and Employee
Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/lecturers', [LecturerController::class, 'index'])
        ->name('lecturers.index');

    Route::get('/lecturershow/{id}', [LecturerController::class, 'show'])
        ->name('lecturershow');

    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    // Admin only
    Route::middleware('role:admin')->group(function () {

        Route::get('/lecturercreate', [LecturerController::class, 'create'])
            ->name('lecturercreate');

        Route::post('/lecturerstore', [LecturerController::class, 'store'])
            ->name('lecturerstore');

        Route::get('/lectureredit/{id}', [LecturerController::class, 'edit'])
            ->name('lectureredit');

        Route::put('/lecturerupdate/{id}', [LecturerController::class, 'update'])
            ->name('lecturerupdate');

        Route::delete('/lecturerdelete/{id}', [LecturerController::class, 'destroy'])
            ->name('lecturerdelete');

    });
    Route::middleware('role:employee')->group(function () {

    Route::get('/employee', function () {
        return 'Welcome Employee';
    });

});

});
