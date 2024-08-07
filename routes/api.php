<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// connexion
Route::post("login", [AuthController::class, "login"]);

Route::middleware("auth")->group(function () {

    // CRUD des étudiants

    Route::prefix('etudiants')->name('etudiants.')->controller(EtudiantController::class)->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::get('forceDelete/{id}', 'forceDelete')->name('forceDelete');
    
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('{etudiant}', 'show')->name('show');
        Route::delete('{etudiant}', 'destroy')->name('destroy');
        Route::post('{etudiant}', 'update')->name('update');
    });
    

    // CRUD des notes

    Route::prefix('evaluations')->name('evaluations.')->controller(EvaluationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{evaluation}', 'show')->name('show');
        Route::delete('{evaluation}', 'destroy')->name('destroy');
        Route::post('etudiants/{id}', 'store')->name('store');
        Route::post('{id}', 'update')->name('update');
    });
    

    // Déconnexion et refresh

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refreshToken']);
});
