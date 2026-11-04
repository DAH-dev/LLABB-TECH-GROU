<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('mis_en_avant', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('testimonials.index', [
            'testimonials' => $testimonials,
        ]);
    }
}