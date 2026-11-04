<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_category_id',
        'titre',
        'slug',
        'extrait',
        'contenu',
        'image_a_la_une',
        'auteur',
        'date_publication',
        'statut',
    ];

    protected $casts = [
        'date_publication' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}