<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "etudiant_id" => $this->faker->numberBetween(1, 6),
            "matiere_id" => $this->faker->numberBetween(1, 10),
            "valeur" => $this->faker->numberBetween(0, 20),
            "date" => $this->faker->date(),
        ];
    }
}
