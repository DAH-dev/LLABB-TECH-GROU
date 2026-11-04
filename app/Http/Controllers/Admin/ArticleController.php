<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->orderBy('date_publication', 'desc')->get();

        return view('admin.articles.index', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        return view('admin.articles.form', [
            'article' => new Article(),
            'categories' => ArticleCategory::orderBy('nom')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateArticle($request);
        $validated['slug'] = Str::slug($validated['titre']);
        $validated['auteur'] = $validated['auteur'] ?: auth()->user()->name;
        $validated['date_publication'] = $validated['date_publication'] ?: now();

        if ($request->hasFile('image_a_la_une')) {
            $validated['image_a_la_une'] = $this->storeImage($request->file('image_a_la_une'));
        } else {
            unset($validated['image_a_la_une']);
        }

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', [
            'article' => $article,
            'categories' => ArticleCategory::orderBy('nom')->get(),
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $this->validateArticle($request);
        $validated['slug'] = Str::slug($validated['titre']);
        $validated['auteur'] = $validated['auteur'] ?: auth()->user()->name;

        if ($request->hasFile('image_a_la_une')) {
            if ($article->image_a_la_une && file_exists(public_path('assets/images/blog/' . $article->image_a_la_une))) {
                @unlink(public_path('assets/images/blog/' . $article->image_a_la_une));
            }
            $validated['image_a_la_une'] = $this->storeImage($request->file('image_a_la_une'));
        } else {
            unset($validated['image_a_la_une']);
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article)
    {
        if ($article->image_a_la_une && file_exists(public_path('assets/images/blog/' . $article->image_a_la_une))) {
            @unlink(public_path('assets/images/blog/' . $article->image_a_la_une));
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé.');
    }

    private function validateArticle(Request $request): array
    {
        return $request->validate([
            'article_category_id' => 'required|exists:article_categories,id',
            'titre' => 'required|string|max:255',
            'extrait' => 'nullable|string',
            'contenu' => 'required|string',
            'image_a_la_une' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'auteur' => 'nullable|string|max:255',
            'date_publication' => 'nullable|date',
            'statut' => 'required|in:brouillon,publie',
        ]);
    }

    private function storeImage($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images/blog'), $filename);

        return $filename;
    }
}