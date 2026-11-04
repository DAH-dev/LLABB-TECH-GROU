<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\SiteSetting;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('est_actif', true)
            ->orderBy('ordre')
            ->get();

        $projects = Project::with('category')
            ->orderBy('ordre')
            ->get();

        $partners = Partner::orderBy('ordre')->get();

       $testimonials = Testimonial::orderBy('mis_en_avant', 'desc')->orderBy('created_at', 'desc')->get();

        $articles = Article::with('category')
            ->where('statut', 'publie')
            ->orderBy('date_publication', 'desc')
            ->take(3)
            ->get();

        $siteSetting = SiteSetting::first();

        $pricingPlans = PricingPlan::orderBy('ordre')->get();

        return view('home', [
            'services' => $services,
            'projects' => $projects,
            'partners' => $partners,
            'testimonials' => $testimonials,
            'articles' => $articles,
            'siteSetting' => $siteSetting,
            'pricingPlans' => $pricingPlans,
        ]);
    }
}