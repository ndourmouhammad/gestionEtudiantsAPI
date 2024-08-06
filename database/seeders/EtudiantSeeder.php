<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            [
                'nom' => "Niang",
                'prenom' => "Serigne Fallou",
                'email' => "serinefallou@gmail.com",
                'mot_de_passe' => Hash::make('password'),
                'adresse' => "Touba",
                'telephone' => "781033501",
                'matricule' => "SFA/2022/001",
                'photo' => "photo.jpg",
            ],

            [
                'nom' => "Ndiaye",
                'prenom' => "Aminata Asaane",
                'email' => "aminataasaane@gmail.com",
                'mot_de_passe' => Hash::make('password'),
                'adresse' => "Dakar",
                'telephone' => "781033500",
                'matricule' => "SFA/2022/002",
                'photo' => "photo.jpg",
            ],

            [
                'nom' => "Diallo",
                'prenom' => "Mariama",
                'email' => "mariama@gmail.com",
                'mot_de_passe' => Hash::make('password'),
                'adresse' => "Dakar",
                'telephone' => "781033502",
                'matricule' => "SFA/2022/003",
                'photo' => "photo.jpg",
            ],
            [
                'nom' => "Cissé",
                'prenom' => "Ndeye Mbombe",
                'email' => "ndeyembombe@gmail.com",
                'mot_de_passe' => Hash::make('password'),
                'adresse' => "Ziguinchor",
                'telephone' => "781033504",
                'matricule' => "SFA/2022/004",
                'photo' => "photo.jpg",
            ],
            [
                'nom' => "Sagna",
                'prenom' => "Moussa",
                'email' => "moussa@gmail.com",
                'mot_de_passe' => Hash::make('password'),
                'adresse' => "Dakar",
                'telephone' => "781033505",
                'matricule' => "SFA/2022/005",
                'photo' => "photo.jpg",
            ],
            [
                'nom' => "Ndour",
                'prenom' => "Mouhammad",
                'email' => "mouhammad@gmail.com",
                'mot_de_passe' => Hash::make('password'),
                'adresse' => "Diourbel",
                'telephone' => "781033507",
                'matricule' => "SFA/2022/006",
                'photo' => "photo.jpg",
            ]
        ];
        foreach ($etudiants as $etudiant) {
            Etudiant::create($etudiant);
        }
    }
}
