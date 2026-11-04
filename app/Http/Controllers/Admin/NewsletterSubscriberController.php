<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = NewsletterSubscriber::orderBy('created_at', 'desc')->get();

        return view('admin.newsletter.index', [
            'subscribers' => $subscribers,
        ]);
    }

    public function export(): StreamedResponse
    {
        $subscribers = NewsletterSubscriber::orderBy('created_at')->get();

        $filename = 'abonnes-newsletter-' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($subscribers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Email', 'Date d\'inscription']);

            foreach ($subscribers as $subscriber) {
                fputcsv($handle, [
                    $subscriber->email,
                    $subscriber->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.newsletter.index')->with('success', 'Abonné désinscrit.');
    }
}