<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->text('texte_a_propos')->nullable();
            $table->string('competence_1_nom')->nullable();
            $table->integer('competence_1_pourcentage')->default(0);
            $table->string('competence_2_nom')->nullable();
            $table->integer('competence_2_pourcentage')->default(0);
            $table->string('competence_3_nom')->nullable();
            $table->integer('competence_3_pourcentage')->default(0);
            $table->integer('annees_experience')->default(0);
            $table->integer('nb_projets')->default(0);
            $table->integer('nb_clients')->default(0);
            $table->integer('nb_tickets_resolus')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};