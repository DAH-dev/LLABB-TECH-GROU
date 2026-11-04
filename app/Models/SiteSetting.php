<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'texte_a_propos',
        'competence_1_nom', 'competence_1_pourcentage',
        'competence_2_nom', 'competence_2_pourcentage',
        'competence_3_nom', 'competence_3_pourcentage',
        'annees_experience', 'nb_projets', 'nb_clients', 'nb_tickets_resolus',
        'telephone', 'email_contact', 'adresse',
        'lien_facebook', 'lien_twitter', 'lien_linkedin', 'lien_instagram',
        'seo_titre', 'seo_description',
    ];
}