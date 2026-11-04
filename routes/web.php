<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\NouvelleController;
use App\Http\Controllers\Admin\CompteRenduController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/equipe', [PageController::class, 'team'])->name('team');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{service:slug}', [PageController::class, 'serviceShow'])->name('services.show');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{project:slug}', [PageController::class, 'projectShow'])->name('portfolio.show');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{article:slug}', [PageController::class, 'articleShow'])->name('blog.show');
Route::get('/tarifs', [PageController::class, 'pricing'])->name('pricing');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/mentions-legales', [PageController::class, 'legal'])->name('legal');
Route::get('/admin/connexion', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/connexion', [AuthController::class, 'login']);
Route::post('/admin/deconnexion', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/newsletter', [ContactController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');
Route::get('/temoignages', [PageController::class, 'testimonials'])->name('temoignages');
Route::get('/nouvelles', [PageController::class, 'nouvelles'])->name('nouvelles');
Route::get('/nouvelles/{nouvelle:slug}', [PageController::class, 'nouvelleShow'])->name('nouvelles.show');
Route::get('/langue/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['fr', 'en', 'es'], true), 404);
    session(['locale' => $locale]);

    return back();
})->name('lang.switch');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('team', TeamMemberController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('pricing', PricingPlanController::class);
    Route::resource('faq', FaqItemController::class);
    Route::resource('nouvelles', NouvelleController::class)->except(['show']);
    Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::patch('messages/{message}', [ContactMessageController::class, 'updateStatus'])->name('messages.update-status');
    Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::get('newsletter', [NewsletterSubscriberController::class, 'index'])->name('newsletter.index');
    Route::get('newsletter/export', [NewsletterSubscriberController::class, 'export'])->name('newsletter.export');
    Route::delete('newsletter/{subscriber}', [NewsletterSubscriberController::class, 'destroy'])->name('newsletter.destroy');
    Route::resource('users', UserController::class);
    Route::get('parametres', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('parametres', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('comptes-rendus', CompteRenduController::class)
        ->parameters(['comptes-rendus' => 'compteRendu'])
        ->names('rapports');

   
});
