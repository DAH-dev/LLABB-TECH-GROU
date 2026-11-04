<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('service_interesse')->nullable();
            $table->string('budget')->nullable();
            $table->text('message');
            $table->boolean('inscription_newsletter')->default(false);
            $table->string('statut')->default('a_traiter');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};