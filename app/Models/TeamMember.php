<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'poste',
        'photo',
        'bio',
        'lien_linkedin',
        'lien_twitter',
        'ordre',
    ];
}