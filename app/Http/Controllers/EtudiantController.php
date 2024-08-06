<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtudiantRequest;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return $this->customJsonResponse("Liste des etudiants", $etudiants);
    }

    /**
     * Ajouter un nouvel etudiant
     */
    public function store(StoreEtudiantRequest $request)
    {
        $etudiant = new Etudiant();
        $etudiant->fill($request->validated());
        if ($request->hasFile('photo')) {
            $etudiant->photo = $request->file('photo')->store('public/photos');
        }
        $etudiant->save();
        return $this->customJsonResponse("Etudiant ajouté avec succès", $etudiant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return $this->customJsonResponse("Etudiant récupéré avec succès", $etudiant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
