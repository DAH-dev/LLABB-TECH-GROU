<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'entreprise',
        'texte',
        'note',
        'photo',
        'mis_en_avant',
    ];
}