<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('valeur');
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropForeign(['matiere_id']);
            $table->dropForeign(['etudiant_id']);
        });
        Schema::dropIfExists('evaluations');
    }
};
