<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->constrained()->cascadeOnDelete();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->string('client')->nullable();
            $table->text('probleme')->nullable();
            $table->text('solution')->nullable();
            $table->text('resultats')->nullable();
            $table->string('image_couverture')->nullable();
            $table->boolean('mis_en_avant')->default(false);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};