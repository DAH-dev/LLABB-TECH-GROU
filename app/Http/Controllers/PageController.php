<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Project;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Nouvelle;

class PageController extends Controller
{
    public function about()
    {
        $teamMembers = TeamMember::orderBy('ordre')->get();

        return view('about', [
            'teamMembers' => $teamMembers,
        ]);
    }

    public function services()
    {
        $services = Service::where('est_actif', true)
            ->orderBy('ordre')
            ->get();

        return view('services', [
            'services' => $services,
        ]);
    }

    public function serviceShow(Service $service)
    {
        return view('service-detail', [
            'service' => $service,
        ]);
    }

    public function portfolio()
    {
        $projects = Project::with('category')
            ->orderBy('ordre')
            ->get();

        return view('portfolio', [
            'projects' => $projects,
        ]);
    }

    public function projectShow(Project $project)
    {
        return view('project-detail', [
            'project' => $project,
        ]);
    }

    public function blog()
    {
        $articles = Article::with('category')
            ->where('statut', 'publie')
            ->orderBy('date_publication', 'desc')
            ->get();

        return view('blog', [
            'articles' => $articles,
        ]);
    }

    public function articleShow(Article $article)
    {
        $relatedArticles = Article::where('article_category_id', $article->article_category_id)
            ->where('id', '!=', $article->id)
            ->where('statut', 'publie')
            ->take(3)
            ->get();

        return view('article-detail', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
        ]);
    }
    public function team()
    {
        $teamMembers = TeamMember::orderBy('ordre')->get();

        return view('team', [
            'teamMembers' => $teamMembers,
        ]);
    }
    public function pricing()
    {
        $pricingPlans = \App\Models\PricingPlan::orderBy('ordre')->get();

        return view('pricing', [
            'pricingPlans' => $pricingPlans,
        ]);
    }

        public function faq()
    {
        $faqItems = \App\Models\FaqItem::orderBy('ordre')->get();

        return view('faq', [
            'faqItems' => $faqItems,
        ]);
    }
        public function contact()
    {
        return view('contact');
    }
        public function legal()
    {
        return view('legal');
    }
    public function testimonials()
{
    $testimonials = Testimonial::orderBy('mis_en_avant', 'desc')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('testimonials.index', [
        'testimonials' => $testimonials,
    ]);
}
public function nouvelles()
{
    $nouvelles = Nouvelle::where('publie', true)
        ->orderBy('date_publication', 'desc')
        ->get();

    return view('nouvelles.index', [
        'nouvelles' => $nouvelles,
    ]);
}

public function nouvelleShow(Nouvelle $nouvelle)
{
    abort_unless($nouvelle->publie, 404);

    $autres = Nouvelle::where('publie', true)
        ->where('id', '!=', $nouvelle->id)
        ->orderBy('date_publication', 'desc')
        ->take(3)
        ->get();

    return view('nouvelles.show', [
        'nouvelle' => $nouvelle,
        'autres' => $autres,
    ]);
}
}