<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Portfolio;
use App\Resume;
use App\Article;
use App\Setting;
use App\Http\Resources\Resource;
use Carbon\Carbon;

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

    public function settingIndex()
    {
        $setting = $this->setting->all();

        return Resource::collection($setting);
    }

    public function settingUpdate(Request $request)
    {
        $options = $request->except('_token', '_method');

        foreach($options as $i => $option) {
            if (is_array($option)) {
                $options[$i] = json_encode($option);
            }
        }

        $this->updateSettings($options);

        return redirect()->back();
    }

    public function updateSettings(array $options)
    {
        foreach ($options as $name => $value)
        {
            $option = DB::table('settings')->where('name', $name)->first();
            
            if ($option) {
                DB::table('settings')->where('name', $name)->update(array('value' => $value, 'updated_at' => Carbon::now()));
            } else {
                DB::table('settings')->insert(array('name' => $name, 'value' => $value));
            }
        }
    }
}
