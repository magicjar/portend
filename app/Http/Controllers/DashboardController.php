<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;
use App\Resume;
use App\Article;
use App\Setting;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Portfolio $portfolio, Resume $resume, Article $article, Setting $setting)
    {
        $this->middleware('auth');
        $this->portfolio = $portfolio;
        $this->resume = $resume;
        $this->article = $article;
        $this->setting = $setting;
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function about()
    {
        return view('dashboard.about');
    }

    public function skill()
    {
        return view('dashboard.skill');
    }

    public function education()
    {
        return view('dashboard.education');
    }

    public function experience()
    {
        return view('dashboard.experience');
    }

    public function portfolio()
    {
        return view('dashboard.portfolio');
    }

    public function portfolioStore(Request $request)
    {
        //
    }

    public function articleCategory()
    {
        return view('dashboard.article.category');
    }

    public function articleTag()
    {
        return view('dashboard.article.tag');
    }

    public function portfolioCategory()
    {
        return view('dashboard.portfolio.category');
    }

    public function portfolioTag()
    {
        return view('dashboard.portfolio.tag');
    }

    public function testimonial()
    {
        return view('dashboard.testimonial');
    }

    public function setting()
    {
        return view('dashboard.setting');
    }

    public function settingStore(Request $request)
    {
        //
    }
}
