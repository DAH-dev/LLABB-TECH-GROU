<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_category_id')->constrained()->cascadeOnDelete();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('extrait')->nullable();
            $table->longText('contenu');
            $table->string('image_a_la_une')->nullable();
            $table->string('auteur')->nullable();
            $table->timestamp('date_publication')->nullable();
            $table->string('statut')->default('brouillon');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};