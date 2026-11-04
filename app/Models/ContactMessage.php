<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'entreprise',
        'service_interesse',
        'budget',
        'message',
        'inscription_newsletter',
        'statut',
    ];
}