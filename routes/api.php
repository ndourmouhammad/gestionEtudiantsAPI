<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Models\Etudiant;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("etudiants", EtudiantController::class)->only(["index", "store", "show", "destroy"]);

Route::post("etudiants/{etudiant}", [EtudiantController::class, "update"])->name("etudiants.update");
