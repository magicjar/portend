<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('homepage');

Route::post('contact', 'HomeController@contact')->name('contact');

Route::get('article/{article}', 'HomeController@articleShow')->name('article.show');
Route::get('article', 'HomeController@articleIndex')->name('article.index');

Route::get('portfolio/{portfolio}', 'HomeController@portfolioShow')->name('portfolio.show');

Auth::routes();

// Api Route
Route::group(['prefix' => 'api', 'as' => 'api.'], function(){

	$setting = App::make('setting');

	// Article
	if ($setting->setting['showArticle']) {
		Route::get('article', 'ApiController@articleIndex')->name('article.index');
		Route::get('article/{article}', 'ApiController@articleEdit')->name('article.edit');
		Route::delete('article/{article}', 'ApiController@articleDestroy')->name('article.destroy');
	}
	
	// Portfolio
	Route::get('portfolio', 'ApiController@portfolioIndex')->name('portfolio.index');
	Route::get('portfolio/{portfolio}', 'ApiController@portfolioEdit')->name('portfolio.edit');
	Route::delete('portfolio/{portfolio}', 'ApiController@portfolioDestroy')->name('portfolio.destroy');

	// Testimonial
	if ($setting->setting['showTestimonial']) {
		Route::get('testimonial', 'ApiController@testimonialIndex')->name('testimonial.index');
		Route::post('testimonial', 'ApiController@testimonialStore')->name('testimonial.store');
		Route::put('testimonial', 'ApiController@testimonialStore')->name('testimonial.update');
		Route::delete('testimonial/{id}', 'ApiController@testimonialDestroy')->name('testimonial.destroy');
	}

	// Media
	Route::post('media/upload', 'MediaController@upload')->name('media.upload');
	Route::get('media', 'MediaController@mediaIndex')->name('media.index');
	Route::put('media', 'MediaController@mediaPut')->name('media.update');
	Route::delete('media/{id}', 'MediaController@mediaDelete')->name('media.destroy');

	// Setting
	Route::put('setting', 'DashboardController@settingUpdate')->name('setting.update');

	// Category
	Route::get('category', 'ApiController@categoryIndex')->name('portfolio.index');
	Route::post('category', 'ApiController@categoryStore')->name('portfolio.store');
	Route::put('category', 'ApiController@categoryStore')->name('portfolio.update');
	Route::delete('category/{category}', 'ApiController@categoryDestroy')->name('portfolio.destroy');

	// Tag
	Route::get('tag', 'ApiController@tagIndex')->name('tag.index');
	Route::post('tag', 'ApiController@tagStore')->name('tag.store');
	Route::put('tag', 'ApiController@tagStore')->name('tag.update');
	Route::delete('tag/{tag}', 'ApiController@tagDestroy')->name('tag.destroy');

	// Resume (Skill, Experience, Education)
	if ($setting->setting['showExperience'] || $setting->setting['showSkill'] || $setting->setting['showEducation']) {
		Route::get('resume', 'ApiController@resumeIndex')->name('resume.index');
		Route::post('resume', 'ApiController@resumeStore')->name('resume.store');
		Route::put('resume', 'ApiController@resumeStore')->name('resume.update');
		Route::delete('resume/{id}', 'ApiController@resumeDestroy')->name('resume.destroy');
	}
});

// Controller Route
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){

	$setting = App::make('setting');

	Route::get('/', 'DashboardController@index')->name('index');

	Route::get('about', 'DashboardController@about')->name('about');

	Route::get('media', 'DashboardController@media')->name('media');

	if ($setting->setting['showSkill']) {
		Route::get('resume/skill', 'DashboardController@skill')->name('skill');
	}

	if ($setting->setting['showEducation']) {
		Route::get('resume/education', 'DashboardController@education')->name('education');
	}

	if ($setting->setting['showExperience']) {
		Route::get('resume/experience', 'DashboardController@experience')->name('experience');
	}

	if ($setting->setting['showTestimonial']) {
		Route::get('testimonial', 'DashboardController@testimonial')->name('testimonial');
	}

	if ($setting->setting['showArticle']) {
		Route::get('article/category', 'DashboardController@articleCategory')->name('article.category');
		Route::get('article/tag', 'DashboardController@articleTag')->name('article.tag');
		Route::resource('article', 'ArticleController', 
            ['except' => ['show', 'destroy']]);
	}

	Route::get('portfolio/category', 'DashboardController@portfolioCategory')->name('portfolio.category');
	Route::get('portfolio/tag', 'DashboardController@portfolioTag')->name('portfolio.tag');
	Route::resource('portfolio', 'PortfolioController', ['except' => ['show', 'destroy']]);

	Route::get('setting', 'DashboardController@setting')->name('setting');

	Route::get('update', 'UpdateController@update')->name('update');
	Route::post('update-schema', 'UpdateController@updateSchema')->name('update.schema');
});
