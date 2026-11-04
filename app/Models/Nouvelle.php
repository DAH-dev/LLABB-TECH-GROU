<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nouvelle extends Model
{
    protected $fillable = [
        'titre',
        'slug',
        'resume',
        'contenu',
        'image',
        'date_publication',
        'publie',
    ];

    protected $casts = [
        'date_publication' => 'date',
        'publie' => 'boolean',
    ];
}