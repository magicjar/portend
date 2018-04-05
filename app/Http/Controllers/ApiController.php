<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Article;
use App\Portfolio;
use App\Resume;
use App\Category;
use App\Tag;
use App\Testimonial;
use App\Setting;
use App\Http\Resources\Resource;

class ApiController extends Controller
{
    public function __construct(Article $article, Portfolio $portfolio, Resume $resume, Category $category, Tag $tag, Testimonial $testimonial, Setting $setting)
    {
        $this->middleware('auth');
        $this->article = $article;
        $this->portfolio = $portfolio;
        $this->resume = $resume;
        $this->category = $category;
        $this->tag = $tag;
        $this->testimonial = $testimonial;
        $this->setting = $setting;
    }

    public function articleIndex()
    {
        $articles = $this->article->with('image')->orderBy('created_at', 'desc')->paginate(5);

        return Resource::collection($articles);
    }

    public function articleEdit($id)
    {
        $article = $this->article->with('category', 'tag', 'image')->findOrFail($id);

        return new Resource($article);
    }

    public function portfolioEdit($id)
    {
        $portfolio = $this->portfolio->with('category', 'tag', 'image', 'media')->findOrFail($id);

        return new Resource($portfolio);
    }

    public function categoryIndex()
    {
        $categories = $this->category->where('type', Input::get('type'))->get();

        return Resource::collection($categories);
    }

    public function categoryStore(Request $request)
    {
        $category = $request->isMethod('put') ? $this->category->findOrFail($request->category_id) : new $this->category;

        $category->name = $request['name'];
        $category->slug = $request['slug'];
        $category->description = $request['description'];
        $category->type = $request['type'];

        if($category->save()){
            return new Resource($category);
        }
    }

    public function categoryDestroy($id)
    {
        $category = $this->category->findOrFail($id);

        if($category->delete()){
            return new Resource($category);
        }
    }

    public function tagIndex()
    {
        $tags = $this->tag->where('type', Input::get('type'))->get();

        return Resource::collection($tags);
    }

    public function tagStore(Request $request)
    {
        $tag = $request->isMethod('put') ? $this->tag->findOrFail($request->tag_id) : new $this->tag;

        $tag->name = $request['name'];
        $tag->slug = $request['slug'];
        $tag->description = $request['description'];
        $tag->type = $request['type'];

        if($tag->save()){
            return new Resource($tag);
        }
    }

    public function tagDestroy($id)
    {
        $tag = $this->tag->findOrFail($id);

        if($tag->delete()){
            return new Resource($tag);
        }
    }

    public function resumeIndex()
    {
        $resume = $this->resume->where('resume_type', Input::get('type'))->orderBy('created_at', 'desc')->get();

        return Resource::collection($resume);
    }

    public function resumeStore(Request $request)
    {
        $resume = $request->isMethod('put') ? $this->resume->findOrFail($request->resume_id) : new $this->resume;

        $resume->id = $request['resume_id'];
        $resume->name = $request['name'];
        $resume->institution = $request['institution'];
        $resume->date_start = $request['date_start'];
        $resume->date_end = $request['date_end'];
        $resume->description = $request['description'];
        $resume->resume_type = $request['resume_type'];

        if($resume->save()){
            return new Resource($resume);
        }
    }

    public function resumeDestroy($id)
    {
        $resume = $this->resume->findOrFail($id);

        if($resume->delete()){
            return new Resource($resume);
        }
    }

    public function testimonialIndex()
    {
        $testimonials = $this->testimonial->all();

        return Resource::collection($testimonials);
    }

    public function testimonialStore(Request $request)
    {
        $testimonial = $request->isMethod('put') ? $this->testimonial->findOrFail($request->testimonial_id) : new $this->testimonial;

        $testimonial->id = $request['testimonial_id'];
        $testimonial->title = $request['title'];
        $testimonial->content = $request['content'];
        $testimonial->author = $request['author'];
        $testimonial->url = $request['url'];

        if($testimonial->save()){
            return new Resource($testimonial);
        }
    }

    public function testimonialDestroy($id)
    {
        $testimonial = $this->testimonial->findOrFail($id);

        if($testimonial->delete()){
            return new Resource($testimonial);
        }
    }
}