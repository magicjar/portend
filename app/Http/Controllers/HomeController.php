<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App;
use App\Resume;
use App\Article;
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
        $this->setting = App::make('setting');
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

        Mail::send('email-view', $message, function($data) use ($email, $message){
            $data->from($message['email']);
            $data->to($email);
            $data->subject($message['subject']);
        });

        return redirect()->back()->with('success', 'Your email was Sent!');
    }
}
