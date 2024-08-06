<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UniteEnseignement>
 */
class UniteEnseignementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unite_enseignements = [
            "Introduction à l'informatique", "Développement Web Fondamentaux", "Bases de Données", "Développement Web Avancé", "Conception et Développement d’Applications", "Sécurité Informatique et Réseaux", "Projets et Méthodologies", "DevOps et Cloud Computing", "Big Data et Intelligence Artificielle", "Stage et Projet de Fin d’Études"
        ];
        return [
            'libelle' => $this->faker->randomElement($unite_enseignements),
            'coefficient' => $this->faker->numberBetween(1, 6),
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
        ];
    }
}

