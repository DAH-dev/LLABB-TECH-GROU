<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->string('icone')->nullable();
            $table->text('resume')->nullable();
            $table->longText('description')->nullable();
            $table->longText('methodologie')->nullable();
            $table->text('technologies')->nullable();
            $table->integer('ordre')->default(0);
            $table->boolean('est_actif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};