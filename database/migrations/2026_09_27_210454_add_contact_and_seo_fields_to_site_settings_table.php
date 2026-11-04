<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('telephone')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('adresse')->nullable();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_twitter')->nullable();
            $table->string('lien_linkedin')->nullable();
            $table->string('lien_instagram')->nullable();
            $table->string('seo_titre')->nullable();
            $table->text('seo_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'telephone', 'email_contact', 'adresse',
                'lien_facebook', 'lien_twitter', 'lien_linkedin', 'lien_instagram',
                'seo_titre', 'seo_description',
            ]);
        });
    }
};