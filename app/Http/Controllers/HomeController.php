<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App, View;
use App\Resume;
use App\Article;
use App\Portfolio;
use App\Testimonial;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Article $article, Portfolio $portfolio, Resume $resume, Testimonial $testimonial)
    {
        $this->article = $article;
        $this->portfolio = $portfolio;
        $this->resume = $resume;
        $this->testimonial = $testimonial;
        $setting = App::make('setting');
        View::share('setting', $setting);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->orderBy('created_at', 'desc')->take(4)->get();

        $portfolios = $this->portfolio->orderBy('created_at', 'desc')->take(4)->get();

        $resumes = $this->resume->orderBy('created_at', 'desc')->get();

        $testimonials = $this->testimonial->all();

        return view('main.home', compact('articles', 'portfolios', 'resumes', 'testimonials'));
    }

    /**
     * Show the portfolio index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function portfolioIndex()
    {
        $portfolios = $this->portfolio->paginate(10);

        return view('main.portfolio-index', compact('portfolios'));
    }

    /**
     * Show the portfolio single page.
     *
     * @return \Illuminate\Http\Response
     */
    public function portfolioShow($id)
    {
        $portfolio = $this->portfolio->findOrFail($id);

        return view('main.portfolio-show', compact('portfolio'));
    }

    /**
     * Show the article index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function articleIndex()
    {
        $articles = $this->article->paginate(4);

        return view('main.article-index', compact('articles'));
    }

    /**
     * Show the article single page.
     *
     * @return \Illuminate\Http\Response
     */
    public function articleShow($id)
    {
        $article = $this->article->findOrFail($id);

        return view('main.article-show', compact('article'));
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'min:5',
            'message' => 'required|min:20',
        ]);

        $message = [
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'content' => $request['message']
        ];

        $email = $this->setting->getContactEmail();

        Mail::send('main.email-view', $message, function($data) use ($email, $message){
            $data->from($message['email']);
            $data->to($email);
            $data->subject($message['subject']);
        });

        return redirect()->back()->with('success', 'Your email was Sent!');
    }
}
