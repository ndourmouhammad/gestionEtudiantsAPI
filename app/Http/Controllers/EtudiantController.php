<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
        $etudiant->fill($request->validated());
        if ($request->hasFile('photo')) {
            if (File::exists(public_path($etudiant->photo))) {
                File::delete(public_path($etudiant->photo));
            }
            $etudiant->photo = $request->file('photo')->store('public/photos');
        }
        $etudiant->update();
        return $this->customJsonResponse("Etudiant mis à jour avec succès", $etudiant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return $this->customJsonResponse("Etudiant supprimé avec succès", null, 200);
    }

    // Restaurer un etudiant
    public function restore($id)
    {
        $etudiant = Etudiant::onlyTrashed()->where('id', $id)->first();
        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant inexistant", null, 404);
        }
        $etudiant->restore();
        return $this->customJsonResponse("Etudiant reprise avec succès", $etudiant);
    }

    // Supprimer definitivement un etudiant
    public function forceDelete($id)
    {
        $etudiant = Etudiant::onlyTrashed()->where('id', $id)->first();
        if (!$etudiant) {
            return $this->customJsonResponse("Etudiant inexistant", null, 404);
        }
        $etudiant->forceDelete();
        return $this->customJsonResponse("Etudiant supprimé definitivement avec succès", null, 200);
    }

    // Liste des etudiants supprimés
    public function trashed()
    {
        $etudiants = Etudiant::onlyTrashed()->get();
        return $this->customJsonResponse("Liste des etudiants supprimés", $etudiants);
    }
}
