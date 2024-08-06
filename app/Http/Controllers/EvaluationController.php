<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Evaluation;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les étudiants avec leurs évaluations et les matières
        $etudiants = Etudiant::with('evaluations.matiere')->get();

        // Retourner les données en format JSON
        return response()->json($etudiants);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request, $etudiantId)
    {
        // Récupérer l'étudiant par son ID
        $etudiant = Etudiant::findOrFail($etudiantId);

        // Créer une nouvelle évaluation avec les données validées et l'associer à l'étudiant
        $evaluation = new Evaluation($request->validated());
        $evaluation->etudiant_id = $etudiant->id;
        $evaluation->save();

        // Retourner une réponse JSON avec succès
        return response()->json([
            'message' => 'Évaluation ajoutée avec succès',
            'evaluation' => $evaluation
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        // Récupérer l'étudiant avec ses évaluations et les matières
        $etudiant = Etudiant::with('evaluations.matiere')->findOrFail($evaluation->etudiant_id);

        // Retourner les données en format JSON
        return response()->json($etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
