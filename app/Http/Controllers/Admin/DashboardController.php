<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'messages_a_traiter' => ContactMessage::where('statut', 'a_traiter')->count(),
            'total_articles' => Article::count(),
            'total_projets' => Project::count(),
        ];

        $derniersMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'derniersMessages' => $derniersMessages,
        ]);
    }
}