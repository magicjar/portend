<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Resume;
use App\Testimonial;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Article $article, Resume $resume, Testimonial $testimonial)
    {
        $this->article = $article;
        $this->resume = $resume;
        $this->testimonial = $testimonial;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->orderBy('created_at', 'desc')->take(4)->get();
        $educations = $this->resume->where('resume_type', 'Education')->orderBy('created_at', 'desc')->get();
        $experiences = $this->resume->where('resume_type', 'Experience')->orderBy('created_at', 'desc')->get();
        $testimonials = $this->testimonial->all();

        return view('welcome', compact('articles', 'educations', 'experiences', 'testimonials'));
    }
}
