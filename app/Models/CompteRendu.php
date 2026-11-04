<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompteRendu extends Model
{
    protected $table = 'comptes_rendus';

    protected $fillable = [
        'user_id',
        'titre',
        'date_rapport',
        'contenu',
    ];

    protected $casts = [
        'date_rapport' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}