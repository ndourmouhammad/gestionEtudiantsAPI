<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("login", [AuthController::class, "login"]);

Route::get("etudiants/trashed", [EtudiantController::class, "trashed"])->name("etudiants.trashed"); 
Route::post("etudiants/{id}/restore", [EtudiantController::class, "restore"])->name("etudiants.restore");
Route::get("etudiants/forceDelete/{id}", [EtudiantController::class, "forceDelete"])->name("etudiants.forceDelete");

Route::apiResource("etudiants", EtudiantController::class)->only(["index", "store", "show", "destroy"]);

Route::post("etudiants/{etudiant}", [EtudiantController::class, "update"])->name("etudiants.update");


// Evaluations
Route::apiResource("evaluations", EvaluationController::class)->only(["index","show", "destroy"]);
Route::post('/etudiants/{id}/evaluations', [EvaluationController::class, 'store']);
Route::post('/evaluations/{id}', [EvaluationController::class, 'update']);
