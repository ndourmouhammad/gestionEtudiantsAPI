<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $matieres = [
            ['libelle' => "Algorithmique et programmation"],
            ['libelle' => " Introduction aux systèmes d’exploitation"],
            ['libelle' => "HTML & CSS"],
            ['libelle' => "Introduction à JavaScript"],
            ['libelle' => "Modélisation de bases de données"],
            ['libelle' => "SQL et gestion de bases de données (MySQL)"],
            ['libelle' => "Programmation orientée objet"],
            ['libelle' => "Programmation fonctionnelle"],
            ['libelle' => "Programmation fonctionnelle avancée"],
            ['libelle' => "Programmation Web"],
            ['libelle' => "Programmation Web avancée"],
        ];

        $matiere = $this->faker->randomElement($matieres);
        return [
            "libelle" => $matiere["libelle"],
            "ue_id" => $this->faker->numberBetween(1, 10),
            "date_debut" => $this->faker->date(),
            "date_fin" => $this->faker->date(),
        ];
    }
}
