<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->string('entreprise')->nullable();
            $table->text('texte');
            $table->integer('note')->default(5);
            $table->string('photo')->nullable();
            $table->boolean('mis_en_avant')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};